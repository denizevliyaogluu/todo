import React, { useState, useEffect } from 'react';
import { getTodos } from '../api/todoApi';
import TodoList from '../components/TodoList'; // TodoList bileşeni
import TodoFilter from '../components/TodoFilter'; // TodoFilter bileşeni

const TodoListPage = () => {
  const [todos, setTodos] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchTodos = async () => {
      try {
        const response = await getTodos();
        setTodos(response.data);
      } catch (err) {
        setError(err.message);
      } finally {
        setLoading(false);
      }
    };
    fetchTodos();
  }, []);

  return (
    <div className="todo-list-container">
      <h1 className="text-3xl font-semibold mb-6">Todo Listesi</h1>

      {/* Todo Filtreleme */}
      <TodoFilter />

      {loading && <p>Yükleniyor...</p>}
      {error && <p>Hata: {error}</p>}

      {/* Todo Listesi */}
      <TodoList todos={todos} />
    </div>
  );
};

export default TodoListPage;
