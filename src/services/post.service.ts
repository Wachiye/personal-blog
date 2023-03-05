/**
 * Data Model Interfaces
 */

import { IPost, Post } from "../models/post.model";
/**
 * In-Memory Store
 */


for (let i = 0; i < 10; i++) {
    const post = new Post({
        title: `Post ${i}`,
        slug: `post-${i}`,
        excerpt: `Excerpt for post ${i}`,
        content: `This is the content for Post ${i}`,
        tags: ['tag1', 'tag2', 'tag3'],
        author: {
            name: 'John Doe',
            email: 'johndoe@example.com',
            avatar: 'https://www.example.com/avatar.jpg'
        },
        image: "https://picsum.photos/200/300",
        createdAt: new Date()
    });

    createPost(post);
}
/**
 * Service Methods
 */

export async function createPost(postData: IPost): Promise<IPost> {
    const post = new Post(postData);
    return await post.save();
}

export async function getPostById(id: string): Promise<IPost | null> {
    return await Post.findById(id).exec();
}

export async function getPostBySlug(slug: string): Promise<IPost | null> {
    return await Post.findOne({ slug }).exec();
}

export async function updatePost(
    id: string,
    update: Partial<IPost>
): Promise<IPost | null> {
    return await Post.findByIdAndUpdate(id, update, {
        new: true,
        runValidators: true,
    }).exec();
}

export async function deletePost(id: string): Promise<IPost | null> {
    return await Post.findByIdAndDelete(id).exec();
}

export async function getAllPosts(): Promise<IPost[]> {
    return await Post.find().exec();
}
