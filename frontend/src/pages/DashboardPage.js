import React, { useState, useEffect } from 'react';
import { getTodos } from '../api/todoApi';
import TodoList from '../components/TodoList'; // TodoList bileşeni

const DashboardPage = () => {
  const [todos, setTodos] = useState([]);
  const [upcomingTodos, setUpcomingTodos] = useState([]);
  const [stats, setStats] = useState({ pending: 0, completed: 0 });

  useEffect(() => {
    const fetchTodos = async () => {
      try {
        const response = await getTodos();
        setTodos(response.data);
        const pendingCount = response.data.filter(todo => todo.status === 'pending').length;
        const completedCount = response.data.filter(todo => todo.status === 'completed').length;
        setStats({ pending: pendingCount, completed: completedCount });

        const upcoming = response.data.filter(todo => new Date(todo.due_date) > new Date()); // Yaklaşan todo'lar
        setUpcomingTodos(upcoming);
      } catch (err) {
        console.error(err);
      }
    };
    fetchTodos();
  }, []);

  return (
    <div className="dashboard-container">
      <h1 className="text-3xl font-semibold mb-6">Dashboard</h1>

      {/* Özet İstatistikler */}
      <div className="stats mb-6 flex justify-between">
        <div className="stat-item bg-blue-200 p-4 rounded-md">
          <h3 className="text-xl">Bekleyen</h3>
          <p className="text-2xl">{stats.pending}</p>
        </div>
        <div className="stat-item bg-green-200 p-4 rounded-md">
          <h3 className="text-xl">Tamamlanan</h3>
          <p className="text-2xl">{stats.completed}</p>
        </div>
      </div>

      {/* Yaklaşan Todo'lar */}
      <h2 className="text-2xl font-semibold mb-4">Yaklaşan Todo'lar</h2>
      <TodoList todos={upcomingTodos} />
    </div>
  );
};

export default DashboardPage;
