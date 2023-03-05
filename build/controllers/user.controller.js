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
exports.deleteUser = exports.updateUser = exports.createUser = exports.getUserByUsername = exports.getAllUsers = void 0;
const UserService = __importStar(require("../services/user.service"));
function getAllUsers(req, res) {
    return __awaiter(this, void 0, void 0, function* () {
        try {
            const users = yield UserService.getAllUsers();
            res.status(200).json(users);
        }
        catch (e) {
            res.status(500).json({ error: e.message });
        }
    });
}
exports.getAllUsers = getAllUsers;
;
function getUserByUsername(req, res) {
    return __awaiter(this, void 0, void 0, function* () {
        const slug = req.params.slug;
        try {
            const user = yield UserService.getUserByUsername(slug);
            if (user) {
                return res.status(200).send(user);
            }
            res.status(404).json({ error: "User not found" });
        }
        catch (e) {
            res.status(500).json({ error: e.message });
        }
    });
}
exports.getUserByUsername = getUserByUsername;
function createUser(req, res) {
    return __awaiter(this, void 0, void 0, function* () {
        try {
            const user = req.body;
            const newUser = yield UserService.createUser(user);
            res.status(201).json(newUser);
        }
        catch (e) {
            res.status(500).json({ error: e.message });
        }
    });
}
exports.createUser = createUser;
function updateUser(req, res) {
    return __awaiter(this, void 0, void 0, function* () {
        const id = req.params.id;
        try {
            const userUpdate = req.body;
            const existingUser = yield UserService.getUserByUsername(id);
            if (existingUser) {
                const updatedItem = yield UserService.updateUser(id, userUpdate);
                return res.status(200).json(updatedItem);
            }
            const newUser = yield UserService.createUser(userUpdate);
            res.status(201).json(newUser);
        }
        catch (e) {
            res.status(500).json({ error: e.message });
        }
    });
}
exports.updateUser = updateUser;
function deleteUser(req, res) {
    return __awaiter(this, void 0, void 0, function* () {
        try {
            const id = req.params.id;
            yield UserService.deleteUser(id);
            res.status(200).json({ message: "User deleted" });
        }
        catch (e) {
            res.status(500).json({ error: e.message });
        }
    });
}
exports.deleteUser = deleteUser;
//# sourceMappingURL=user.controller.js.map