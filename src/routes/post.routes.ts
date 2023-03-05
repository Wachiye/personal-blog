/**
 * Required External Modules and Interfaces
 */
import express from "express";
import * as PostController from "../controllers/post.controller";

const router = express.Router();

// POST posts,
router.post("/", PostController.createPost);
// GET posts
router.get("/", PostController.getAllPosts);
// GET posts/:slug
router.get("/:slug", PostController.getPostBySlug);
// PUT posts/:slug
router.put("/:slug", PostController.updatePost);
// DELETE posts/:slug
router.delete("/:slug", PostController.deletePost);

export default router;