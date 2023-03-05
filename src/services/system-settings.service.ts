/**
 * Data Model Interfaces
 */

import { SystemSetting } from "../models/system-settings.model";
/**
 * In-Memory Store
 */
let systemSettings: SystemSetting = {
    name: "Wachiye Siranjofu",
    description: "",
    email: "siranjofuw@gmail.com",
    contact: "254790983123",
    address: "Nairobi, Kenya",
    keywords: "wachiye siranjofu",
    icon: "https://cdn.auth0.com/blog/whatabyte/burger-sm.png"
}

/**
 * Service Methods
 */

export const getSystemSettings = async (): Promise<SystemSetting> => systemSettings;


export const saveSystemSettings = async (newItem: SystemSetting): Promise<SystemSetting | undefined> => {
    systemSettings = {
        ...newItem
    };

    return systemSettings;
};



export const resetSystemSettings = async (): Promise<null | void> => {
    systemSettings = {
        name: "Wachiye Siranjofu",
        description: "",
        email: "siranjofuw@gmail.com",
        contact: "254790983123",
        address: "Nairobi, Kenya",
        keywords: "wachiye siranjofu",
        icon: "https://cdn.auth0.com/blog/whatabyte/burger-sm.png"
    }
};