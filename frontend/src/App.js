import React, { useState, useEffect } from 'react';
import TodoListPage from './pages/TodoListPage';
import TodoForm from './components/TodoForm';
import { createTodo, getTodos } from './api/todoApi';  // 'api/todoApi' yolu kullanıyoruz


const App = () => {
  const [todos, setTodos] = useState([]);

  // Todo listesini almak için useEffect kullan
  useEffect(() => {
    const fetchTodos = async () => {
      const data = await getTodos();
      setTodos(data);
    };
    fetchTodos();
  }, []);

  // Yeni todo ekleme fonksiyonu
  const handleAddTodo = async (newTodo) => {
    try {
      const createdTodo = await createTodo(newTodo);
      setTodos([...todos, createdTodo]);
    } catch (error) {
      console.error('Todo eklenirken hata oluştu:', error);
    }
  };

  return (
    <div className="bg-gray-100 min-h-screen p-6">
      <div className="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 className="text-3xl font-semibold text-center text-indigo-600 mb-8">Todo Uygulaması</h1>
        
        {/* Yeni todo oluşturma formu */}
        <div className="mb-8">
          <TodoForm onSubmit={handleAddTodo} />  {/* onSubmit fonksiyonunu buraya ilettik */}
        </div>
        
        {/* Todo listesi sayfası */}
        <div>
          <TodoListPage todos={todos} /> {/* Todo listelerini TodoListPage bileşenine aktarıyoruz */}
        </div>
      </div>
    </div>
  );
};

export default App;
