const { startCon } = require('./server/WaConnection')
const http = require('http');
const express = require('express');
const app = express();
const server = http.createServer(app);
const router = express.Router();
const { Server } = require('socket.io');
const io = new Server(server);
require('dotenv').config();
app.use(express.json());
app.use(express.urlencoded({ extended: true }))
app.use(router);
require('./server/Routes')(router)

io.on('connection', (socket) => {
    socket.on('StartConnection', async (device) => {
        startCon(device, socket)
        return;
    })
    socket.on('LogoutDevice', (device) => {
        startCon(device, socket, true)
        return
    })
})
server.listen(process.env.PORT_NODE, () => {
    console.log(`Server running on port ${process.env.PORT_NODE}`);
})



