import bcrypt from "bcryptjs";
import jwt from "jsonwebtoken";
import crypto from 'crypto';
import { model, Schema, Model, Document } from 'mongoose';

//declare user type
export interface IUser extends Document {
    getResetPasswordToken(): string;
    getSignedToken(): string;
    matchPassword(password: string): Promise<boolean>;
    username: string;
    firstName: string;
    lastName: string;
    avatar: string;
    bio: string;
    phone: string;
    email: string;
    password: string;
    active: boolean;
    resetPasswordToken?: string;
    resetPasswordExpire?: Date;
    createdAt: Date;
    updatedAt: Date;
}

// define user schema
const UserSchema: Schema = new Schema({
    username: {
        type: String,
        lowercase: true,
        unique: true,
        required: [true, "Can't be blank"],
        index: true,
    },
    email: {
        type: String,
        lowercase: true,
        required: [true, "Can't be blank"],
        match: [/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/, 'Please use a valid address'],
        unique: true,
        index: true
    },
    firstName: { type: String, required: [true, "Can't be blank"] },
    lastName: { type: String, required: [true, "Can't be blank"] },
    avatar: String,
    bio: String,
    phone: { type: String, required: [true, "Can't be blank"] },
    password: {
        type: String,
        required: true,
        select: false,
        minlength: [8, "Please use minimum of 8 characters"],
    },
    resetPasswordToken: String,
    resetPasswordExpire: Date,
    active: { type: Boolean, default: true },
});

UserSchema.pre<IUser>("save", async function (next) {
    if (!this.isModified('password')) {
        return next();
    }
    const salt = await bcrypt.genSalt(10);
    this.password = await bcrypt.hash(this.password, salt);
    next();
});

UserSchema.methods.matchPassword = async function (password: string) {
    return await bcrypt.compare(password, this.password)
}
UserSchema.methods.getSignedToken = function () {
    return jwt.sign({ id: this._id }, process.env.JWT_SECRET!, {
        expiresIn: process.env.JWT_EXPIRE
    })
}
UserSchema.methods.getResetPasswordToken = function () {
    const resetToken = crypto.randomBytes(20).toString('hex');
    this.resetPasswordToken = crypto.
        createHash('sha256')
        .update(resetToken)
        .digest('hex');
    this.resetPasswordExpire = new Date(Date.now() + 10 * (60 * 1000))
    return resetToken

}
export const User: Model<IUser> = model<IUser>("User", UserSchema);
