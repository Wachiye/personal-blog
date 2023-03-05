/**
 * Required External Modules and Interfaces
 */
import express from "express";
import * as SystemSettingsController from "../controllers/system-settings.controller";

/**
 * Router Definition
 */
const systemSettingsRouter = express.Router();
/**
 * Controller Definitions
 */

// GET items
systemSettingsRouter.get("/", SystemSettingsController.getSystemSettings);
// POST items
systemSettingsRouter.post("/", SystemSettingsController.saveSystemSetting);
// DELETE items/:id
systemSettingsRouter.get("/reset", SystemSettingsController.resetSystemSetting);

export default systemSettingsRouter;