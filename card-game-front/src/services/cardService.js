import axios from 'axios';

const API_BASE_URL = 'http://localhost:8000/api';

export const getSortedHand = async () => {
    const response = await axios.get(`${API_BASE_URL}/hand/sorted`);
    return response.data;
};
