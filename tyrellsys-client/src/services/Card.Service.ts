import api from '../api-config.json';

/**
 * Load distributed card from api.
 * @param noOfPlayer
 */
export const loadDistributedCard = async (noOfPlayer: number) => {
  try {
    const response = await fetch(`${api.cardApi}/${noOfPlayer}`);
    return await response.json();
  } catch (error) {
    console.error(error);
  }
  return Promise.reject(null);
};
