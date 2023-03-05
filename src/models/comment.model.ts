import { Schema, model, Document, Model } from 'mongoose';
import { IPost } from './post.model';

export interface IComment extends Document {
    firstName: string,
    lastName: string,
    content: string;
    post: IPost['_id']; // reference to Post model,
    createdAt: Date;
    updatedAt: Date;
}

const CommentSchema: Schema = new Schema({
    firstName: { type: String, required: [true, "Can't be blank"] },
    lastName: { type: String, required: [true, "Can't be blank"] },
    content: {
        type: String,
        required: [true, "Comment can't be blank"],
    },
    post: {
        type: Schema.Types.ObjectId,
        ref: 'Post',
        required: true,
    },
}, {
    timestamps: true,
});

export const Comment: Model<IComment> = model<IComment>('Comment', CommentSchema);
