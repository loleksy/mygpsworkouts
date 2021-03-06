<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trackpoint
 *
 * @ORM\Table(name="trackpoint", indexes={@ORM\Index(name="fk_trackpoints_workouts1_idx", columns={"workout_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TrackpointRepository")
 */
class Trackpoint implements \JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="`index`", type="integer", nullable=false)
     */
    protected $index;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime", nullable=false)
     */
    protected $datetime;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="decimal", precision=9, scale=6, nullable=false)
     */
    protected $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="lng", type="decimal", precision=9, scale=6, nullable=false)
     */
    protected $lng;

    /**
     * @var integer
     *
     * @ORM\Column(name="altitude_meters", type="integer", nullable=true)
     */
    protected $altitudeMeters;

    /**
     * @var integer
     *
     * @ORM\Column(name="heart_rate_bpm", type="integer", nullable=true)
     */
    protected $heartRateBpm;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \AppBundle\Entity\Workout
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Workout", inversedBy="trackpoints")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="workout_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    protected $workout;



    /**
     * Set index
     *
     * @param integer $index
     * @return Trackpoint
     */
    public function setIndex($index)
    {
        $this->index = $index;

        return $this;
    }

    /**
     * Get index
     *
     * @return integer 
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return Trackpoint
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime 
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set lat
     *
     * @param string $lat
     * @return Trackpoint
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return string 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lng
     *
     * @param string $lng
     * @return Trackpoint
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Get lng
     *
     * @return string 
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set altitudeMeters
     *
     * @param integer $altitudeMeters
     * @return Trackpoint
     */
    public function setAltitudeMeters($altitudeMeters)
    {
        $this->altitudeMeters = $altitudeMeters;

        return $this;
    }

    /**
     * Get altitudeMeters
     *
     * @return integer 
     */
    public function getAltitudeMeters()
    {
        return $this->altitudeMeters;
    }

    /**
     * Set heartRateBpm
     *
     * @param integer $heartRateBpm
     * @return Trackpoint
     */
    public function setHeartRateBpm($heartRateBpm)
    {
        $this->heartRateBpm = $heartRateBpm;

        return $this;
    }

    /**
     * Get heartRateBpm
     *
     * @return integer 
     */
    public function getHeartRateBpm()
    {
        return $this->heartRateBpm;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set workout
     *
     * @param \AppBundle\Entity\Workout $workout
     * @return Trackpoint
     */
    public function setWorkout(\AppBundle\Entity\Workout $workout = null)
    {
        $this->workout = $workout;

        return $this;
    }

    /**
     * Get workout
     *
     * @return \AppBundle\Entity\Workout 
     */
    public function getWorkout()
    {
        return $this->workout;
    }

    public function jsonSerialize(){
        return array(
            $this->getDatetime()->getTimestamp(),
            $this->getLat(),
            $this->getLng(),
            $this->getAltitudeMeters(),
            $this->getHeartRateBpm()
        );
    }
}
