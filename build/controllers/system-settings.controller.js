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
exports.resetSystemSetting = exports.saveSystemSetting = exports.getSystemSettings = void 0;
const SystemSettingService = __importStar(require("../services/system-settings.service"));
function getSystemSettings(req, res) {
    return __awaiter(this, void 0, void 0, function* () {
        try {
            const settings = yield SystemSettingService.getSystemSettings();
            res.status(200).json(settings);
        }
        catch (e) {
            res.status(500).json({ error: e.message });
        }
    });
}
exports.getSystemSettings = getSystemSettings;
;
function saveSystemSetting(req, res) {
    return __awaiter(this, void 0, void 0, function* () {
        try {
            const system = req.body;
            const newSystemSetting = yield SystemSettingService.saveSystemSettings(system);
            res.status(201).json(newSystemSetting);
        }
        catch (e) {
            res.status(500).json({ error: e.message });
        }
    });
}
exports.saveSystemSetting = saveSystemSetting;
function resetSystemSetting(req, res) {
    return __awaiter(this, void 0, void 0, function* () {
        try {
            yield SystemSettingService.resetSystemSettings();
            res.status(200).json({ message: " System settings have been reset" });
        }
        catch (e) {
            res.status(500).json({ error: e.message });
        }
    });
}
exports.resetSystemSetting = resetSystemSetting;
//# sourceMappingURL=system-settings.controller.js.map