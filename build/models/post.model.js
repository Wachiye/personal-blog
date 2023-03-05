"use strict";
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
exports.Post = void 0;
const mongoose_1 = require("mongoose");
// define post schema
const PostSchema = new mongoose_1.Schema({
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
        type: mongoose_1.Schema.Types.ObjectId,
        ref: 'User',
    },
    viewCount: { type: Number, default: 0 },
    image: { type: String, required: [true, "Can't be blank"] },
    published: { type: Boolean, default: false },
    comments: [
        {
            type: mongoose_1.Schema.Types.ObjectId,
            ref: 'Comment',
        },
    ],
});
PostSchema.pre("save", function (next) {
    return __awaiter(this, void 0, void 0, function* () {
        // generate slug here
        // this.slug = generateSlug();
        next();
    });
});
PostSchema.methods.publish = function () {
    return __awaiter(this, void 0, void 0, function* () {
        if (!this.published) {
            this.published = true;
        }
    });
};
exports.Post = (0, mongoose_1.model)("Post", PostSchema);
//# sourceMappingURL=post.model.js.map