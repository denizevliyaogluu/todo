import axios from 'axios';

const API_URL = 'http://127.0.0.1:8000/api'; // Your API URL

const delay = (ms) => new Promise((resolve) => setTimeout(resolve, ms));

export const getTodos = async () => {
  try {
    const response = await axios.get(`${API_URL}/todos`);
    return response.data;
  } catch (error) {
    if (error.response && error.response.status === 429) {
      // If we hit a 429 (Too Many Requests), wait for 2 seconds and retry
      console.log('Rate limit exceeded. Retrying in 2 seconds...');
      await delay(2000);
      return getTodos(); // Retry the request
    } else {
      console.error('Error fetching todos:', error);
      throw error; // Rethrow the error if it's not a rate limit error
    }
  }
};

// Yeni bir todo eklemek için fonksiyon
export const createTodo = async (newTodo) => {
  try {
    const response = await axios.post(`${API_URL}/todos`, newTodo);
    return response.data; // API'den gelen veriyi döndür
  } catch (error) {
    console.error('Error creating todo:', error);
    throw error; // Hata durumunda hata fırlat
  }
};

// Todo'yu güncellemek için fonksiyon
export const updateTodo = async (id, updatedTodo) => {
  try {
    const response = await axios.put(`${API_URL}/todos/${id}`, updatedTodo);
    return response.data; // API'den gelen veriyi döndür
  } catch (error) {
    console.error('Error updating todo:', error);
    throw error; // Hata durumunda hata fırlat
  }
};

// Todo'yu silmek için fonksiyon
export const deleteTodo = async (id) => {
  try {
    await axios.delete(`${API_URL}/todos/${id}`);
  } catch (error) {
    console.error('Error deleting todo:', error);
    throw error; // Hata durumunda hata fırlat
  }
};
