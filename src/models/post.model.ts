import { model, Schema, Model, Document } from 'mongoose';
import { IComment } from './comment.model';
import { IUser } from './user.model';

//declare post type
export interface IPost extends Document {
    publish(): void;
    title: string;
    slug: string;
    excerpt: string;
    content: string;
    tags: string[];
    viewCount: number;
    image: string;
    author: IUser['_id'];
    comments: Array<IComment['_id']>;
    createdAt: Date;
    updatedAt: Date;
}

// define post schema
const PostSchema: Schema = new Schema({
    title: {
        type: String,
        required: [true, "Can't be blank"],
        index: true
    },
    slug: {
        type: String,
        required: true,
        unique: true,
        index: true
    },
    excerpt: {
        type: String,
        required: [true, "Can't be blank"],
    },
    content: {
        type: String,
        required: [true, "Can't be blank"],
    },
    tags: [{
        type: String,
        required: [true, "Can't be blank"],
    }],
    author: {
        type: Schema.Types.ObjectId,
        ref: 'User',
    },
    viewCount: { type: Number, default: 0 },
    image: { type: String, required: [true, "Can't be blank"] },
    published: { type: Boolean, default: false },
    comments: [
        {
            type: Schema.Types.ObjectId,
            ref: 'Comment',
        },
    ],
});

PostSchema.pre<IPost>("save", async function (next: any) {
    // generate slug here
    // this.slug = generateSlug();
    next();
});

PostSchema.methods.publish = async function () {
    if (!this.published) {
        this.published = true;
    }
};

export const Post: Model<IPost> = model<IPost>("Post", PostSchema);
