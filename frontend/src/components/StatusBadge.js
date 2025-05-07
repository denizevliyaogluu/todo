import React from 'react';

const StatusBadge = ({ status }) => {
  let badgeClass = '';
  if (status === 'completed') {
    badgeClass = 'bg-green-500';
  } else if (status === 'pending') {
    badgeClass = 'bg-yellow-500';
  } else {
    badgeClass = 'bg-gray-500';
  }

  return (
    <span className={`text-white py-1 px-3 rounded-md ${badgeClass}`}>
      {status}
    </span>
  );
};

export default StatusBadge;
