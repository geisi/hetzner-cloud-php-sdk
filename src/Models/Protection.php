<?php
/**
 * Created by PhpStorm.
 * User: lukaskammerling
 * Date: 01.04.18
 * Time: 19:02
 */

namespace LKDev\HetznerCloud\Models;

class Protection extends Model
{
    /**
     * @var boolean
     */
    public $delete;

    /**
     * @var boolean
     */
    public $rebuild;

    /**
     * Protection constructor.
     *
     * @param bool $delete
     * @param bool $rebuild
     */
    public function __construct(bool $delete, bool $rebuild = null)
    {
        $this->delete = $delete;
        $this->rebuild = $rebuild;
    }

    /**
     * @param $input
     * @return \LKDev\HetznerCloud\Models\Protection|null|static
     */
    public static function parse($input)
    {

        if ($input == null) {
            return null;
        }

        return new self($input->delete, (property_exists($input, 'rebuild') ? $input->rebuild : null));
    }
}