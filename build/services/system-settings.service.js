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
exports.resetSystemSettings = exports.saveSystemSettings = exports.getSystemSettings = void 0;
/**
 * In-Memory Store
 */
let systemSettings = {
    name: "Wachiye Siranjofu",
    description: "",
    email: "siranjofuw@gmail.com",
    contact: "254790983123",
    address: "Nairobi, Kenya",
    keywords: "wachiye siranjofu",
    icon: "https://cdn.auth0.com/blog/whatabyte/burger-sm.png"
};
/**
 * Service Methods
 */
const getSystemSettings = () => __awaiter(void 0, void 0, void 0, function* () { return systemSettings; });
exports.getSystemSettings = getSystemSettings;
const saveSystemSettings = (newItem) => __awaiter(void 0, void 0, void 0, function* () {
    systemSettings = Object.assign({}, newItem);
    return systemSettings;
});
exports.saveSystemSettings = saveSystemSettings;
const resetSystemSettings = () => __awaiter(void 0, void 0, void 0, function* () {
    systemSettings = {
        name: "Wachiye Siranjofu",
        description: "",
        email: "siranjofuw@gmail.com",
        contact: "254790983123",
        address: "Nairobi, Kenya",
        keywords: "wachiye siranjofu",
        icon: "https://cdn.auth0.com/blog/whatabyte/burger-sm.png"
    };
});
exports.resetSystemSettings = resetSystemSettings;
//# sourceMappingURL=system-settings.service.js.map