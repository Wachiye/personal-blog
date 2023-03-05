import { Request, Response, NextFunction } from "express";
import { IPost } from "../models/post.model";
import * as PostService from "../services/post.service";

export async function getAllPosts(req: Request, res: Response) {
    try {
        const posts: IPost[] = await PostService.getAllPosts();
        res.status(200).json(posts);
    } catch (e: any) {
        res.status(500).json({ error: e.message });
    }
};

export async function getPostBySlug(req: Request, res: Response) {
    const slug: string = req.params.slug

    try {
        const post = await PostService.getPostBySlug(slug)

        if (post) {
            return res.status(200).send(post);
        }

        res.status(404).json({ error: "Post not found" });
    } catch (e: any) {
        res.status(500).json({ error: e.message });
    }
}

export async function createPost(req: Request, res: Response) {
    try {
        const post: IPost = req.body;

        const newPost = await PostService.createPost(post);

        res.status(201).json(newPost);
    } catch (e: any) {
        res.status(500).json({ error: e.message });
    }
}

export async function updatePost(req: Request, res: Response) {
    const slug: string = req.params.slug;

    try {
        const postUpdate: IPost = req.body;

        const existingPost = await PostService.getPostBySlug(slug);

        if (existingPost) {
            const updatedItem = await PostService.updatePost(slug, postUpdate);
            return res.status(200).json(updatedItem);
        }

        const newPost = await PostService.createPost(postUpdate);

        res.status(201).json(newPost);
    } catch (e: any) {
        res.status(500).json({ error: e.message });
    }
}


export async function deletePost(req: Request, res: Response) {
    try {
        const slug: string = req.params.slug;
        await PostService.deletePost(slug);
        res.status(200).json({ message: "Post deleted" });
    } catch (e: any) {
        res.status(500).json({ error: e.message });
    }
}