var server = require('http').Server();

var io = require('socket.io')(server);

io.origins((origin, callback) => {
    if (origin !== 'http://auctioneer.test') {
        return callback('origin not allowed', false);
    }
    callback(null, true);
  });

var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('bids-channel');

redis.on('message', function (channel, message) {
    message = JSON.parse(message);
    io.emit(channel + message.data.item_id + ':' + message.event, message.data);
});

// This bit here can be 'tricked' with rapid refreshes, but eventually all ghost connections time out so i think it's fine
var usersConnected = 0;
io.on('connection', function (socket) {
    usersConnected++;
    socket.on('disconnect', function () {
        usersConnected--;
        io.emit('visitorsConnected', usersConnected);
    });
    io.emit('visitorsConnected', usersConnected);
});

setInterval(function(){
    io.emit('move-time', new Date().toISOString());
}, 1000);

server.listen(3000);
