"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.Comment = void 0;
const mongoose_1 = require("mongoose");
const CommentSchema = new mongoose_1.Schema({
    firstName: { type: String, required: [true, "Can't be blank"] },
    lastName: { type: String, required: [true, "Can't be blank"] },
    content: {
        type: String,
        required: [true, "Comment can't be blank"],
    },
    post: {
        type: mongoose_1.Schema.Types.ObjectId,
        ref: 'Post',
        required: true,
    },
}, {
    timestamps: true,
});
exports.Comment = (0, mongoose_1.model)('Comment', CommentSchema);
//# sourceMappingURL=comment.model.js.map