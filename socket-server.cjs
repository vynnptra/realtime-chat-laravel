const express = require('express');
const http = require('http');
const cors = require('cors');
const { Server } = require('socket.io');

const app = express();
app.use(cors());
app.use(express.json());

const server = http.createServer(app);
const io = new Server(server, {
  cors: {
    origin: "*"
  }
});

io.on('connection', (socket) => {
  console.log('User connected');

  socket.on('join-room', (room) => {
    socket.join(room);
  });
});

app.post('/send-message', (req, res) => {
  const { message } = req.body;

  const fromRoom = `chat.${message.from}`;
  const toRoom = `chat.${message.to}`;

  console.log(`Broadcasting message from ${fromRoom} to ${toRoom}:`, message);

  io.to(fromRoom).emit('chat-message', message);
  io.to(toRoom).emit('chat-message', message);

  return res.status(200).json({ status: 'sent' });
});


server.listen(6001, () => {
  console.log('Socket.IO server running on port 6001');
});
