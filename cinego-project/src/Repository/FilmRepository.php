<?php

namespace App\Repository;

use App\Entity\Film;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Film>
 */
class FilmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Film::class);
    }

    /**
     * @return Film[] Returns an array of Film objects
     */
    public function findAllFilms(): array
    {
        return $this->createQueryBuilder('f')
            ->orderBy('f.id', 'ASC') // Optional: Order films by their ID or any field
            ->getQuery()
            ->getResult(); // Returns an array of Film objects
    }

    /**
     * @param mixed $value The value to search for in the field
     * @return Film[] Returns an array of Film objects that match the criteria
     */
    public function findFilmsByField(string $field, $value): array
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.' . $field . ' = :val') // Dynamically use the field name
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param string $field The field name to search for
     * @param mixed $value The value to search for in the field
     * @return Film|null Returns a single Film object or null if no match is found
     */
    public function findOneFilmByField(string $field, $value): ?Film
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.' . $field . ' = :val') // Dynamically use the field name
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param string $genre The genre to filter films by
     * @param int $limit The number of films to return
     * @return Film[] Returns an array of Film objects
     */
    public function findFilmsByGenre(string $genre, int $limit = 10): array
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.genre = :genre') // Assuming 'genre' is a field in the Film entity
            ->setParameter('genre', $genre)
            ->setMaxResults($limit)
            ->orderBy('f.id', 'ASC') // Optional ordering
            ->getQuery()
            ->getResult();
    }

    /**
     * @param string $title The title of the film to search for
     * @return Film|null Returns a single Film object or null if no match is found
     */
    public function findFilmByTitle(string $title): ?Film
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.title = :title') // Assuming 'title' is a field in the Film entity
            ->setParameter('title', $title)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @return Film[] Returns an array of films ordered by release date (descending)
     */
    public function findFilmsByReleaseDate(): array
    {
        return $this->createQueryBuilder('f')
            ->orderBy('f.releaseDate', 'DESC') // Assuming 'releaseDate' is a field in the Film entity
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Film[] Returns an array of films by a given director
     */
    public function findFilmsByDirector(string $director): array
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.director = :director') // Assuming 'director' is a field in the Film entity
            ->setParameter('director', $director)
            ->getQuery()
            ->getResult();
    }
}
