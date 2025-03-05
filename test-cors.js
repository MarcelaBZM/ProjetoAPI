// test-cors.js
import corsMiddleware from './cors.js';

const mockRequest = {};
const mockResponse = {
  header: (name, value) => console.log(`Header: ${name}=${value}`)
};
const next = () => console.log('Middleware funcionando!');

corsMiddleware(mockRequest, mockResponse, next);