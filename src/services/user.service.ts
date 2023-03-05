/**
 * Data Model Interfaces
 */

import { IUser, User } from "../models/user.model";
/**
 * In-Memory Store
 */


for (let i = 0; i < 5; i++) {
    const user = new User({
        firstName: 'John',
        lastName: 'Doe',
        username: `john-doe-${i}`,
        email: 'johndoe@example.com',
        phone: '12345769606',
        bio: 'bio for user',
        password: '12345678',
        active: true,
        avatar: "https://picsum.photos/200/200",
        createdAt: new Date()
    });

    // createUser(user);
}
/**
 * Service Methods
 */

export async function createUser(userData: IUser): Promise<IUser> {
    const user = new User(userData);
    return await user.save();
}

export async function getUserById(id: string): Promise<IUser | null> {
    return await User.findById(id).exec();
}

export async function getUserByUsername(username: string): Promise<IUser | null> {
    return await User.findOne({ username }).exec();
}

export async function updateUser(
    username: string,
    update: Partial<IUser>
): Promise<IUser | null> {
    return await User.findOneAndUpdate({ username }, update, {
        new: true,
        runValidators: true,
    }).exec();
}

export async function deleteUser(username: string): Promise<IUser | null> {
    return await User.findOneAndDelete({ username }).exec();
}

export async function getAllUsers(): Promise<IUser[]> {
    return await User.find().exec();
}
