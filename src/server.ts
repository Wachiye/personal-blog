/**
 * Required External Modules
 */
import 'dotenv/config';
import { Request, Response, NextFunction } from "express";

import validateEnv from './utils/validateEnv';

import { notFoundHandler } from "./middleware/not-found.middleware";
import { errorHandler } from "./middleware/error.middleware";

import postRoutes from './routes/post.routes';
import userRouter from './routes/user.routes';

import App from "./app";

validateEnv();

const app = new App(
    [{ path: "/users", router: userRouter }, { path: "/posts", router: postRoutes }],
);

app.app.use((req: Request, res: Response, next: NextFunction) => {
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

app.app.use(errorHandler);
app.app.use(notFoundHandler);

app.listen();