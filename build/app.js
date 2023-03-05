"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const body_parser_1 = __importDefault(require("body-parser"));
const express_1 = __importDefault(require("express"));
const mongoose_1 = __importDefault(require("mongoose"));
const cors_1 = __importDefault(require("cors"));
const helmet_1 = __importDefault(require("helmet"));
const morgan_1 = __importDefault(require("morgan"));
const path_1 = __importDefault(require("path"));
const PORT = parseInt(process.env.PORT, 10);
const MONGO_URI = process.env.MONGO_URI;
class App {
    constructor(routers) {
        this.app = (0, express_1.default)();
        this.connectToTheDatabase();
        this.setConfigurations();
        this.initializeRouters(routers);
    }
    listen() {
        this.app.listen(PORT, () => {
            console.log(`App listening on the port ${PORT}`);
        });
    }
    setConfigurations() {
        // public folder
        this.app.use(express_1.default.static(path_1.default.join(__dirname, 'public')));
        // view engine
        this.app.set('view engine', 'hbs');
        // cors
        this.app.use((0, cors_1.default)());
        this.app.use((0, helmet_1.default)());
        /** Parse the request */
        this.app.use(body_parser_1.default.urlencoded({ extended: false }));
        /** Takes care of JSON data */
        this.app.use(body_parser_1.default.json());
        /** Logging */
        this.app.use((0, morgan_1.default)('dev'));
    }
    initializeRouters(routers) {
        // default route
        this.app.get('/', (req, res) => {
            return res.json({
                message: 'Wachiye Siranjofu API',
            });
        });
        // other routes
        routers.forEach((router) => {
            this.app.use(router.path, router.router);
        });
    }
    connectToTheDatabase() {
        mongoose_1.default.connect(MONGO_URI)
            .catch(err => console.log(err));
    }
}
exports.default = App;
//# sourceMappingURL=app.js.map