<?php declare(strict_types=1);

namespace Youhey\Iff;

use Closure;

class Iff
{
    /** @var Closure */
    private Closure $condition;

    /** @var Closure|null */
    private ?Closure $then;

    /** @var Closure|null */
    private ?Closure $else;

    /** @var bool|null */
    private ?bool $result;

    /**
     * constructor
     *
     * @param Closure $condition
     */
    private function __construct(Closure $condition)
    {
        $this->condition = $condition;
    }

    /**
     * Create IF statement from condition
     *
     * @param Closure $condition
     *
     * @return Iff
     */
    public static function new(Closure $condition): Iff
    {
        return new static($condition);
    }

    /**
     * Run if true
     *
     * @param Closure $callback
     *
     * @return Iff
     */
    public function then(Closure $callback): Iff
    {
        $this->then = $callback;
        return $this;
    }

    /**
     * Run if false
     *
     * @param Closure $callback
     *
     * @return Iff
     */
    public function else(Closure $callback): Iff
    {
        $this->else = $callback;
        return $this;
    }

    /**
     * Done if
     *
     * @return mixed
     */
    public function done()
    {
        $this->result = ($this->condition)();
        if ($result) {
            return ($this->then !== null) ? ($this->then)() : null;
        }
        return ($this->else !== null) ? ($this->else)() : null;
    }
}
