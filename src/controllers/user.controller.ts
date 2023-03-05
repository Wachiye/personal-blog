import { Request, Response, NextFunction } from "express";
import { IUser } from "../models/user.model";
import * as UserService from "../services/user.service";

export async function getAllUsers(req: Request, res: Response) {
    try {
        const users: IUser[] = await UserService.getAllUsers();
        res.status(200).json(users);
    } catch (e: any) {
        res.status(500).json({ error: e.message });
    }
};

export async function getUserByUsername(req: Request, res: Response) {
    const slug: string = req.params.slug

    try {
        const user = await UserService.getUserByUsername(slug)

        if (user) {
            return res.status(200).send(user);
        }

        res.status(404).json({ error: "User not found" });
    } catch (e: any) {
        res.status(500).json({ error: e.message });
    }
}

export async function createUser(req: Request, res: Response) {
    try {
        const user: IUser = req.body;

        const newUser = await UserService.createUser(user);

        res.status(201).json(newUser);
    } catch (e: any) {
        res.status(500).json({ error: e.message });
    }
}

export async function updateUser(req: Request, res: Response) {
    const id: string = req.params.id;

    try {
        const userUpdate: IUser = req.body;

        const existingUser = await UserService.getUserByUsername(id);

        if (existingUser) {
            const updatedItem = await UserService.updateUser(id, userUpdate);
            return res.status(200).json(updatedItem);
        }

        const newUser = await UserService.createUser(userUpdate);

        res.status(201).json(newUser);
    } catch (e: any) {
        res.status(500).json({ error: e.message });
    }
}


export async function deleteUser(req: Request, res: Response) {
    try {
        const id: string = req.params.id;
        await UserService.deleteUser(id);
        res.status(200).json({ message: "User deleted" });
    } catch (e: any) {
        res.status(500).json({ error: e.message });
    }
}