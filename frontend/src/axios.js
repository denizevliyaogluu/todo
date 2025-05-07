import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000/api',  // API'nin base URL'ini burada belirtin
  headers: {
    'Content-Type': 'application/json',
  },
});

export default api;
