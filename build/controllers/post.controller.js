"use strict";
var __createBinding = (this && this.__createBinding) || (Object.create ? (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    var desc = Object.getOwnPropertyDescriptor(m, k);
    if (!desc || ("get" in desc ? !m.__esModule : desc.writable || desc.configurable)) {
      desc = { enumerable: true, get: function() { return m[k]; } };
    }
    Object.defineProperty(o, k2, desc);
}) : (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    o[k2] = m[k];
}));
var __setModuleDefault = (this && this.__setModuleDefault) || (Object.create ? (function(o, v) {
    Object.defineProperty(o, "default", { enumerable: true, value: v });
}) : function(o, v) {
    o["default"] = v;
});
var __importStar = (this && this.__importStar) || function (mod) {
    if (mod && mod.__esModule) return mod;
    var result = {};
    if (mod != null) for (var k in mod) if (k !== "default" && Object.prototype.hasOwnProperty.call(mod, k)) __createBinding(result, mod, k);
    __setModuleDefault(result, mod);
    return result;
};
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.deletePost = exports.updatePost = exports.createPost = exports.getPostBySlug = exports.getAllPosts = void 0;
const PostService = __importStar(require("../services/post.service"));
function getAllPosts(req, res) {
    return __awaiter(this, void 0, void 0, function* () {
        try {
            const posts = yield PostService.getAllPosts();
            res.status(200).json(posts);
        }
        catch (e) {
            res.status(500).json({ error: e.message });
        }
    });
}
exports.getAllPosts = getAllPosts;
;
function getPostBySlug(req, res) {
    return __awaiter(this, void 0, void 0, function* () {
        const slug = req.params.slug;
        try {
            const post = yield PostService.getPostBySlug(slug);
            if (post) {
                return res.status(200).send(post);
            }
            res.status(404).json({ error: "Post not found" });
        }
        catch (e) {
            res.status(500).json({ error: e.message });
        }
    });
}
exports.getPostBySlug = getPostBySlug;
function createPost(req, res) {
    return __awaiter(this, void 0, void 0, function* () {
        try {
            const post = req.body;
            const newPost = yield PostService.createPost(post);
            res.status(201).json(newPost);
        }
        catch (e) {
            res.status(500).json({ error: e.message });
        }
    });
}
exports.createPost = createPost;
function updatePost(req, res) {
    return __awaiter(this, void 0, void 0, function* () {
        const slug = req.params.slug;
        try {
            const postUpdate = req.body;
            const existingPost = yield PostService.getPostBySlug(slug);
            if (existingPost) {
                const updatedItem = yield PostService.updatePost(slug, postUpdate);
                return res.status(200).json(updatedItem);
            }
            const newPost = yield PostService.createPost(postUpdate);
            res.status(201).json(newPost);
        }
        catch (e) {
            res.status(500).json({ error: e.message });
        }
    });
}
exports.updatePost = updatePost;
function deletePost(req, res) {
    return __awaiter(this, void 0, void 0, function* () {
        try {
            const slug = req.params.slug;
            yield PostService.deletePost(slug);
            res.status(200).json({ message: "Post deleted" });
        }
        catch (e) {
            res.status(500).json({ error: e.message });
        }
    });
}
exports.deletePost = deletePost;
//# sourceMappingURL=post.controller.js.map