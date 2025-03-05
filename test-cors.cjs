
  // test-cors.js
  const middleware = require('./cors.js');
  middleware({}, {
    header: console.log
  }, () => console.log('Middleware funcionando!'));