import bodyParser from 'body-parser';
import express, { Router, Request, Response } from 'express';
import mongoose from 'mongoose';
import cors from "cors";
import helmet from "helmet";
import morgan from 'morgan';
import path from 'path';

const PORT: number = parseInt(process.env.PORT as string, 10);

const MONGO_URI: string = process.env.MONGO_URI as string;

class App {
    public app: express.Application;

    constructor(routers: Array<{ path: string, router: Router }>) {
        this.app = express();

        this.connectToTheDatabase();
        this.setConfigurations();
        this.initializeRouters(routers);
    }

    public listen() {
        this.app.listen(PORT, () => {
            console.log(`App listening on the port ${PORT}`);
        });
    }

    private setConfigurations() {
        // public folder
        this.app.use(express.static(path.join(__dirname, 'public')))

        // view engine
        this.app.set('view engine', 'hbs');
        // cors
        this.app.use(cors());
        this.app.use(helmet());
        /** Parse the request */
        this.app.use(bodyParser.urlencoded({ extended: false }));
        /** Takes care of JSON data */
        this.app.use(bodyParser.json());
        /** Logging */
        this.app.use(morgan('dev'));
    }

    private initializeRouters(routers: Array<{ path: string, router: Router }>) {
        // default route
        this.app.get('/', (req: Request, res: Response) => {
            return res.json({
                message: 'Wachiye Siranjofu API',
            })
        });
        // other routes
        routers.forEach((router) => {
            this.app.use(router.path, router.router);
        });
    }

    private connectToTheDatabase() {
        mongoose.connect(MONGO_URI)
            .catch(err => console.log(err))
    }
}

export default App;