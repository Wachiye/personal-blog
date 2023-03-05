import { Request, Response, NextFunction } from "express";
import { SystemSetting } from "../models/system-settings.model";
import * as SystemSettingService from "../services/system-settings.service";

export async function getSystemSettings(req: Request, res: Response) {
    try {
        const settings: SystemSetting = await SystemSettingService.getSystemSettings();
        res.status(200).json(settings);
    } catch (e: any) {
        res.status(500).json({ error: e.message });
    }
};

export async function saveSystemSetting(req: Request, res: Response) {
    try {
        const system: SystemSetting = req.body;

        const newSystemSetting = await SystemSettingService.saveSystemSettings(system);

        res.status(201).json(newSystemSetting);
    } catch (e: any) {
        res.status(500).json({ error: e.message });
    }
}


export async function resetSystemSetting(req: Request, res: Response) {
    try {
        await SystemSettingService.resetSystemSettings()
        res.status(200).json({ message: " System settings have been reset" });
    } catch (e: any) {
        res.status(500).json({ error: e.message });
    }
}