import React, { useEffect, useState } from 'react';
import { getSortedHand } from './services/cardService';

const Card = ({ color, value }) => (
    <div className="p-2 m-1 border rounded shadow bg-white text-center w-24">
      <div className="font-bold text-lg">{value}</div>
      <div className="text-sm text-gray-600">{color}</div>
    </div>
);

const HandDisplay = ({ title, cards }) => (
    <div className="my-4">
      <h2 className="text-xl font-semibold mb-2">{title}</h2>
      <div className="flex flex-wrap gap-2">
        {cards.map((card, idx) => (
            <Card key={idx} color={card.color} value={card.value} />
        ))}
      </div>
    </div>
);

function App() {
  const [initialHand, setInitialHand] = useState([]);
  const [sortedHand, setSortedHand] = useState([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);

  const fetchHand = async () => {
    setLoading(true);
    setError(null);
    try {
      const data = await getSortedHand();
      setInitialHand(data.initial);
      setSortedHand(data.sorted);
    } catch (err) {
      setError('Erreur lors de la récupération de la main.');
      console.error(err);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    fetchHand();
  }, []);

  return (
      <div className="min-h-screen bg-gray-100 p-6">
        <div className="max-w-3xl mx-auto bg-white p-6 rounded shadow">
          <h1 className="text-3xl font-bold mb-4 text-center">🎴 Jeu de Cartes</h1>

          {loading && <p className="text-center text-blue-600">Chargement...</p>}
          {error && <p className="text-center text-red-600">{error}</p>}

          {!loading && !error && (
              <>
                <HandDisplay title="Main initiale (aléatoire)" cards={initialHand} />
                <HandDisplay title="Main triée" cards={sortedHand} />
              </>
          )}

          <div className="text-center mt-6">
            <button
                onClick={fetchHand}
                className="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
            >
              🔄 Rejouer
            </button>
          </div>
        </div>
      </div>
  );
}

export default App;
