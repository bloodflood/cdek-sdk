<?php
/**
 * This code is licensed under the MIT License.
 *
 * Copyright (c) 2018 Appwilio (http://appwilio.com), greabock (https://github.com/greabock), JhaoDa (https://github.com/jhaoda)
 * Copyright (c) 2018 Alexey Kopytko <alexey@kopytko.com> and contributors
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

declare(strict_types=1);

namespace CdekSDK\Common;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\ExclusionPolicy("all")
 */
final class ChangePeriod
{
    /**
     * @var \DateTimeInterface
     */
    private $DateBeg;

    /**
     * @var \DateTimeInterface
     */
    private $DateEnd;

    /**
     * @JMS\Exclude
     *
     * @var \DateTimeInterface
     */
    private $since;

    /**
     * @JMS\Exclude
     *
     * @var \DateTimeInterface
     */
    private $until;

    public function __construct(\DateTimeInterface $start, \DateTimeInterface $end)
    {
        $this->since = $start;
        $this->until = $end;

        /** @phan-suppress-next-line PhanDeprecatedProperty */
        $this->DateBeg = $this->since;
        /** @phan-suppress-next-line PhanDeprecatedProperty */
        $this->DateEnd = $this->until;
    }

    /**
     * @JMS\XmlAttribute
     * @JMS\SerializedName("DateFirst")
     * @JMS\Type("DateTimeImmutable<'Y-m-d'>")
     * @JMS\VirtualProperty()
     */
    public function getDateFirst()
    {
        return $this->since;
    }

    /**
     * @JMS\XmlAttribute
     * @JMS\SerializedName("DateLast")
     * @JMS\Type("DateTimeImmutable<'Y-m-d'>")
     * @JMS\VirtualProperty()
     */
    public function getDateLast()
    {
        return $this->until;
    }

    /**
     * @JMS\XmlAttribute
     * @JMS\SerializedName("DateBeg")
     * @JMS\Type("DateTimeImmutable<'Y-m-d'>")
     * @JMS\VirtualProperty()
     */
    public function getDateBeg()
    {
        return $this->since;
    }

    /**
     * @JMS\XmlAttribute
     * @JMS\SerializedName("DateEnd")
     * @JMS\Type("DateTimeImmutable<'Y-m-d'>")
     * @JMS\VirtualProperty()
     */
    public function getDateEnd()
    {
        return $this->until;
    }
}
