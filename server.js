import express from 'express';
import { createServer } from 'http';
import { Server } from 'socket.io';

const app = express();
const server = createServer(app);
const io = new Server(server, {
    cors: {
        origin: "*"
    }
});

io.on('connection', (socket) => {
    console.log('Connection established');

    socket.on('disconnect', () => {
        console.log('Disconnected');
    });

    socket.on('nextOrder', (message) => {
        console.log(`Message received: ${message}`);
        io.emit('newOrder', message);
    });

    socket.on('nextCurrent', (message) => {
        console.log(`Message received: ${message}`);
        io.emit('newCurrent', message);
    });
});

server.listen(3000, () => {
    console.log('Server is running on http://localhost:3000');
});
