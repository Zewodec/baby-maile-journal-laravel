const express = require('express');
const http = require('http');
const WebSocket = require('ws');

const app = express();
const server = http.createServer(app);
const wss = new WebSocket.Server({ server });

app.use(express.static('public'));

wss.on('connection', (ws) => {
    ws.on('message', (message) => {
        console.log('received: %s', message);

        // Передаємо отримане повідомлення всім підключеним клієнтам
        wss.clients.forEach((client) => {
            if (client.readyState === WebSocket.OPEN) {
                // Перетворюємо повідомлення на об'єкт і знову в JSON-рядок
                let parsedMessage;
                try {
                    parsedMessage = JSON.parse(message);
                } catch (error) {
                    console.error('Invalid JSON received:', message);
                    return;
                }
                const data = JSON.stringify(parsedMessage);
                client.send(data);
            }
        });
    });

    ws.send(JSON.stringify({ username: 'System', message: 'Вітаю в чаті!' }));
});

server.listen(3000, () => {
    console.log('Server is listening on port 3000');
});
