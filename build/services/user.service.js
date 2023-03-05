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
exports.getAllUsers = exports.deleteUser = exports.updateUser = exports.getUserByUsername = exports.getUserById = exports.createUser = void 0;
const user_model_1 = require("../models/user.model");
/**
 * In-Memory Store
 */
for (let i = 0; i < 5; i++) {
    const user = new user_model_1.User({
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
    createUser(user);
}
/**
 * Service Methods
 */
function createUser(userData) {
    return __awaiter(this, void 0, void 0, function* () {
        const user = new user_model_1.User(userData);
        return yield user.save();
    });
}
exports.createUser = createUser;
function getUserById(id) {
    return __awaiter(this, void 0, void 0, function* () {
        return yield user_model_1.User.findById(id).exec();
    });
}
exports.getUserById = getUserById;
function getUserByUsername(username) {
    return __awaiter(this, void 0, void 0, function* () {
        return yield user_model_1.User.findOne({ username }).exec();
    });
}
exports.getUserByUsername = getUserByUsername;
function updateUser(username, update) {
    return __awaiter(this, void 0, void 0, function* () {
        return yield user_model_1.User.findOneAndUpdate({ username }, update, {
            new: true,
            runValidators: true,
        }).exec();
    });
}
exports.updateUser = updateUser;
function deleteUser(username) {
    return __awaiter(this, void 0, void 0, function* () {
        return yield user_model_1.User.findOneAndDelete({ username }).exec();
    });
}
exports.deleteUser = deleteUser;
function getAllUsers() {
    return __awaiter(this, void 0, void 0, function* () {
        return yield user_model_1.User.find().exec();
    });
}
exports.getAllUsers = getAllUsers;
//# sourceMappingURL=user.service.js.map