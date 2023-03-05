"use strict";
/**
 * Data Model Interfaces
 */
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
exports.getAllPosts = exports.deletePost = exports.updatePost = exports.getPostBySlug = exports.getPostById = exports.createPost = void 0;
const post_model_1 = require("../models/post.model");
/**
 * In-Memory Store
 */
for (let i = 0; i < 10; i++) {
    const post = new post_model_1.Post({
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
function createPost(postData) {
    return __awaiter(this, void 0, void 0, function* () {
        const post = new post_model_1.Post(postData);
        return yield post.save();
    });
}
exports.createPost = createPost;
function getPostById(id) {
    return __awaiter(this, void 0, void 0, function* () {
        return yield post_model_1.Post.findById(id).exec();
    });
}
exports.getPostById = getPostById;
function getPostBySlug(slug) {
    return __awaiter(this, void 0, void 0, function* () {
        return yield post_model_1.Post.findOne({ slug }).exec();
    });
}
exports.getPostBySlug = getPostBySlug;
function updatePost(id, update) {
    return __awaiter(this, void 0, void 0, function* () {
        return yield post_model_1.Post.findByIdAndUpdate(id, update, {
            new: true,
            runValidators: true,
        }).exec();
    });
}
exports.updatePost = updatePost;
function deletePost(id) {
    return __awaiter(this, void 0, void 0, function* () {
        return yield post_model_1.Post.findByIdAndDelete(id).exec();
    });
}
exports.deletePost = deletePost;
function getAllPosts() {
    return __awaiter(this, void 0, void 0, function* () {
        return yield post_model_1.Post.find().exec();
    });
}
exports.getAllPosts = getAllPosts;
//# sourceMappingURL=post.service.js.map