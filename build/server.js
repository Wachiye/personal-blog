"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
/**
 * Required External Modules
 */
require("dotenv/config");
const validateEnv_1 = __importDefault(require("./utils/validateEnv"));
const not_found_middleware_1 = require("./middleware/not-found.middleware");
const error_middleware_1 = require("./middleware/error.middleware");
const post_routes_1 = __importDefault(require("./routes/post.routes"));
const user_routes_1 = __importDefault(require("./routes/user.routes"));
const app_1 = __importDefault(require("./app"));
(0, validateEnv_1.default)();
const app = new app_1.default([{ path: "/users", router: user_routes_1.default }, { path: "/posts", router: post_routes_1.default }]);
app.app.use((req, res, next) => {
    // set the CORS policy
    res.header('Access-Control-Allow-Origin', '*');
    // set the CORS headers
    res.header('Access-Control-Allow-Headers', 'origin, X-Requested-With,Content-Type,Accept, Authorization');
    // set the CORS method headers
    if (req.method === 'OPTIONS') {
        res.header('Access-Control-Allow-Methods', 'GET PATCH DELETE POST');
        return res.status(200).json({});
    }
    next();
});
app.app.use(error_middleware_1.errorHandler);
app.app.use(not_found_middleware_1.notFoundHandler);
app.listen();
//# sourceMappingURL=server.js.map