/**
 * Required External Modules and Interfaces
 */
import express from "express";
import * as UserController from "../controllers/user.controller";

const router = express.Router();
// POST users
router.post("/", UserController.createUser);
// GET users
router.get("/", UserController.getAllUsers);
// GET users/:username
router.get("/:username", UserController.getUserByUsername);
// PUT users/:username
router.put("/:username", UserController.updateUser);
// DELETE users/:username
router.delete("/:username", UserController.deleteUser);


export default router;

