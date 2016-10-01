<?php

/*
  @file
 */

namespace ControlAltKaboom\Srcre\EventManager;

/**
 * Description of GenericEvent
 *
 * @author Brian Snopek <brian.snopek@gmail.com>
 */
class GenericEvent {

  /**
   * @var bool Whether no further event listeners should be triggered
   */
  private $propagationStopped = false;
  /**
   * Returns whether further event listeners should be triggered.
   *
   * @see Event::stopPropagation()
   *
   * @return bool Whether propagation was already stopped for this event
   */
  public function isPropagationStopped()
  {
      return $this->propagationStopped;
  }
  /**
   * Stops the propagation of the event to further event listeners.
   *
   * If multiple event listeners are connected to the same event, no
   * further event listener will be triggered once any trigger calls
   * stopPropagation().
   */
  public function stopPropagation()
  {
      $this->propagationStopped = true;
  }

  /**
   * Event subject.
   *
   * @var mixed usually object or callable
   */
  protected $subject;
  /**
   * Array of arguments.
   *
   * @var array
   */
  protected $arguments;
  /**
   * Encapsulate an event with $subject and $args.
   *
   * @param mixed $subject   The subject of the event, usually an object
   * @param array $arguments Arguments to store in the event
   */
  public function __construct($subject = null, array $arguments = array())
  {
      $this->subject = $subject;
      $this->arguments = $arguments;
  }
  /**
   * Getter for subject property.
   *
   * @return mixed $subject The observer subject
   */
  public function getSubject()
  {
      return $this->subject;
  }
  /**
   * Get argument by key.
   *
   * @param string $key Key
   *
   * @return mixed Contents of array key
   *
   * @throws \InvalidArgumentException If key is not found.
   */
  public function getArgument($key)
  {
      if ($this->hasArgument($key)) {
          return $this->arguments[$key];
      }
      throw new \InvalidArgumentException(sprintf('Argument "%s" not found.', $key));
  }
  /**
   * Add argument to event.
   *
   * @param string $key   Argument name
   * @param mixed  $value Value
   *
   * @return GenericEvent
   */
  public function setArgument($key, $value)
  {
      $this->arguments[$key] = $value;
      return $this;
  }
  /**
   * Getter for all arguments.
   *
   * @return array
   */
  public function getArguments()
  {
      return $this->arguments;
  }
  /**
   * Set args property.
   *
   * @param array $args Arguments
   *
   * @return GenericEvent
   */
  public function setArguments(array $args = array())
  {
      $this->arguments = $args;
      return $this;
  }
  /**
   * Has argument.
   *
   * @param string $key Key of arguments array
   *
   * @return bool
   */
  public function hasArgument($key)
  {
      return array_key_exists($key, $this->arguments);
  }
  /**
   * ArrayAccess for argument getter.
   *
   * @param string $key Array key
   *
   * @return mixed
   *
   * @throws \InvalidArgumentException If key does not exist in $this->args.
   */
  public function offsetGet($key)
  {
      return $this->getArgument($key);
  }
  /**
   * ArrayAccess for argument setter.
   *
   * @param string $key   Array key to set
   * @param mixed  $value Value
   */
  public function offsetSet($key, $value)
  {
      $this->setArgument($key, $value);
  }
  /**
   * ArrayAccess for unset argument.
   *
   * @param string $key Array key
   */
  public function offsetUnset($key)
  {
      if ($this->hasArgument($key)) {
          unset($this->arguments[$key]);
      }
  }
  /**
   * ArrayAccess has argument.
   *
   * @param string $key Array key
   *
   * @return bool
   */
  public function offsetExists($key)
  {
      return $this->hasArgument($key);
  }
  /**
   * IteratorAggregate for iterating over the object like an array.
   *
   * @return \ArrayIterator
   */
  public function getIterator()
  {
      return new \ArrayIterator($this->arguments);
  }
}