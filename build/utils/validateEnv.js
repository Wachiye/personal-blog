"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
const envalid_1 = require("envalid");
function validateEnv() {
    (0, envalid_1.cleanEnv)(process.env, {
        MONGO_URI: (0, envalid_1.str)(),
        PORT: (0, envalid_1.port)(),
    });
}
exports.default = validateEnv;
//# sourceMappingURL=validateEnv.js.map