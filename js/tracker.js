

var socket = io.connect('http://dev.dailyemerald.com:5335/users')
    socket.on('connect', function () {
	    socket.emit('hello', window.location.pathname);
	});
