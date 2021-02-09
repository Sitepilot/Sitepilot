<?php

namespace Sitepilot\Blocks\Fields\Style;

use Sitepilot\Blocks\Fields\ResponsiveSelect;

class Padding extends ResponsiveSelect
{
    public function __construct(...$arguments)
    {
        if (count($arguments) == 1) {
            array_unshift($arguments, __('Padding', 'sitepilot'));
        }

        parent::__construct(...$arguments);

        $choices = [
            'default' => '',
            0 => '0',
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
            8 => 8,
            9 => 9,
            10 => 10,
            11 => 11,
            12 => 12,
            14 => 14,
            16 => 16,
            20 => 20,
            24 => 24,
            28 => 28,
            32 => 32,
            36 => 36,
            40 => 40,
            44 => 44,
            48 => 48,
            52 => 52,
            56 => 56,
            60 => 60,
            64 => 64
        ];

        $this->fields([
            'top' => [
                'label' => __('Top', 'sitepilot'),
                'choices' => $choices
            ],
            'bottom' => [
                'label' => __('Bottom', 'sitepilot'),
                'choices' => $choices
            ],
            'left' => [
                'label' => __('Left', 'sitepilot'),
                'choices' => $choices
            ],
            'right' => [
                'label' => __('Right', 'sitepilot'),
                'choices' => $choices
            ]
        ]);
    }

    protected function format_value($value)
    {
        $pt = [
            'mobile-0' => 'pt-0',
            'mobile-1' => 'pt-1',
            'mobile-2' => 'pt-2',
            'mobile-3' => 'pt-3',
            'mobile-4' => 'pt-4',
            'mobile-5' => 'pt-5',
            'mobile-6' => 'pt-6',
            'mobile-7' => 'pt-7',
            'mobile-8' => 'pt-8',
            'mobile-9' => 'pt-9',
            'mobile-10' => 'pt-10',
            'mobile-11' => 'pt-11',
            'mobile-12' => 'pt-12',
            'mobile-14' => 'pt-14',
            'mobile-16' => 'pt-16',
            'mobile-20' => 'pt-20',
            'mobile-24' => 'pt-24',
            'mobile-28' => 'pt-28',
            'mobile-32' => 'pt-32',
            'mobile-36' => 'pt-36',
            'mobile-40' => 'pt-40',
            'mobile-44' => 'pt-44',
            'mobile-48' => 'pt-48',
            'mobile-52' => 'pt-52',
            'mobile-56' => 'pt-56',
            'mobile-60' => 'pt-60',
            'mobile-64' => 'pt-64',
            'tablet-0' => 'md:pt-0',
            'tablet-1' => 'md:pt-1',
            'tablet-2' => 'md:pt-2',
            'tablet-3' => 'md:pt-3',
            'tablet-4' => 'md:pt-4',
            'tablet-5' => 'md:pt-5',
            'tablet-6' => 'md:pt-6',
            'tablet-7' => 'md:pt-7',
            'tablet-8' => 'md:pt-8',
            'tablet-9' => 'md:pt-9',
            'tablet-10' => 'md:pt-10',
            'tablet-11' => 'md:pt-11',
            'tablet-12' => 'md:pt-12',
            'tablet-14' => 'md:pt-14',
            'tablet-16' => 'md:pt-16',
            'tablet-20' => 'md:pt-20',
            'tablet-24' => 'md:pt-24',
            'tablet-28' => 'md:pt-28',
            'tablet-32' => 'md:pt-32',
            'tablet-36' => 'md:pt-36',
            'tablet-40' => 'md:pt-40',
            'tablet-44' => 'md:pt-44',
            'tablet-48' => 'md:pt-48',
            'tablet-52' => 'md:pt-52',
            'tablet-56' => 'md:pt-56',
            'tablet-60' => 'md:pt-60',
            'tablet-64' => 'md:pt-64',
            'desktop-0' => 'lg:pt-0',
            'desktop-1' => 'lg:pt-1',
            'desktop-2' => 'lg:pt-2',
            'desktop-3' => 'lg:pt-3',
            'desktop-4' => 'lg:pt-4',
            'desktop-5' => 'lg:pt-5',
            'desktop-6' => 'lg:pt-6',
            'desktop-7' => 'lg:pt-7',
            'desktop-8' => 'lg:pt-8',
            'desktop-9' => 'lg:pt-9',
            'desktop-10' => 'lg:pt-10',
            'desktop-11' => 'lg:pt-11',
            'desktop-12' => 'lg:pt-12',
            'desktop-14' => 'lg:pt-14',
            'desktop-16' => 'lg:pt-16',
            'desktop-20' => 'lg:pt-20',
            'desktop-24' => 'lg:pt-24',
            'desktop-28' => 'lg:pt-28',
            'desktop-32' => 'lg:pt-32',
            'desktop-36' => 'lg:pt-36',
            'desktop-40' => 'lg:pt-40',
            'desktop-44' => 'lg:pt-44',
            'desktop-48' => 'lg:pt-48',
            'desktop-52' => 'lg:pt-52',
            'desktop-56' => 'lg:pt-56',
            'desktop-60' => 'lg:pt-60',
            'desktop-64' => 'lg:pt-64',
        ];

        $pb = [
            'mobile-0' => 'pb-0',
            'mobile-1' => 'pb-1',
            'mobile-2' => 'pb-2',
            'mobile-3' => 'pb-3',
            'mobile-4' => 'pb-4',
            'mobile-5' => 'pb-5',
            'mobile-6' => 'pb-6',
            'mobile-7' => 'pb-7',
            'mobile-8' => 'pb-8',
            'mobile-9' => 'pb-9',
            'mobile-10' => 'pb-10',
            'mobile-11' => 'pb-11',
            'mobile-12' => 'pb-12',
            'mobile-14' => 'pb-14',
            'mobile-16' => 'pb-16',
            'mobile-20' => 'pb-20',
            'mobile-24' => 'pb-24',
            'mobile-28' => 'pb-28',
            'mobile-32' => 'pb-32',
            'mobile-36' => 'pb-36',
            'mobile-40' => 'pb-40',
            'mobile-44' => 'pb-44',
            'mobile-48' => 'pb-48',
            'mobile-52' => 'pb-52',
            'mobile-56' => 'pb-56',
            'mobile-60' => 'pb-60',
            'mobile-64' => 'pb-64',
            'tablet-0' => 'md:pb-0',
            'tablet-1' => 'md:pb-1',
            'tablet-2' => 'md:pb-2',
            'tablet-3' => 'md:pb-3',
            'tablet-4' => 'md:pb-4',
            'tablet-5' => 'md:pb-5',
            'tablet-6' => 'md:pb-6',
            'tablet-7' => 'md:pb-7',
            'tablet-8' => 'md:pb-8',
            'tablet-9' => 'md:pb-9',
            'tablet-10' => 'md:pb-10',
            'tablet-11' => 'md:pb-11',
            'tablet-12' => 'md:pb-12',
            'tablet-14' => 'md:pb-14',
            'tablet-16' => 'md:pb-16',
            'tablet-20' => 'md:pb-20',
            'tablet-24' => 'md:pb-24',
            'tablet-28' => 'md:pb-28',
            'tablet-32' => 'md:pb-32',
            'tablet-36' => 'md:pb-36',
            'tablet-40' => 'md:pb-40',
            'tablet-44' => 'md:pb-44',
            'tablet-48' => 'md:pb-48',
            'tablet-52' => 'md:pb-52',
            'tablet-56' => 'md:pb-56',
            'tablet-60' => 'md:pb-60',
            'tablet-64' => 'md:pb-64',
            'desktop-0' => 'lg:pb-0',
            'desktop-1' => 'lg:pb-1',
            'desktop-2' => 'lg:pb-2',
            'desktop-3' => 'lg:pb-3',
            'desktop-4' => 'lg:pb-4',
            'desktop-5' => 'lg:pb-5',
            'desktop-6' => 'lg:pb-6',
            'desktop-7' => 'lg:pb-7',
            'desktop-8' => 'lg:pb-8',
            'desktop-9' => 'lg:pb-9',
            'desktop-10' => 'lg:pb-10',
            'desktop-11' => 'lg:pb-11',
            'desktop-12' => 'lg:pb-12',
            'desktop-14' => 'lg:pb-14',
            'desktop-16' => 'lg:pb-16',
            'desktop-20' => 'lg:pb-20',
            'desktop-24' => 'lg:pb-24',
            'desktop-28' => 'lg:pb-28',
            'desktop-32' => 'lg:pb-32',
            'desktop-36' => 'lg:pb-36',
            'desktop-40' => 'lg:pb-40',
            'desktop-44' => 'lg:pb-44',
            'desktop-48' => 'lg:pb-48',
            'desktop-52' => 'lg:pb-52',
            'desktop-56' => 'lg:pb-56',
            'desktop-60' => 'lg:pb-60',
            'desktop-64' => 'lg:pb-64',
        ];

        $pl = [
            'mobile-0' => 'pl-0',
            'mobile-1' => 'pl-1',
            'mobile-2' => 'pl-2',
            'mobile-3' => 'pl-3',
            'mobile-4' => 'pl-4',
            'mobile-5' => 'pl-5',
            'mobile-6' => 'pl-6',
            'mobile-7' => 'pl-7',
            'mobile-8' => 'pl-8',
            'mobile-9' => 'pl-9',
            'mobile-10' => 'pl-10',
            'mobile-11' => 'pl-11',
            'mobile-12' => 'pl-12',
            'mobile-14' => 'pl-14',
            'mobile-16' => 'pl-16',
            'mobile-20' => 'pl-20',
            'mobile-24' => 'pl-24',
            'mobile-28' => 'pl-28',
            'mobile-32' => 'pl-32',
            'mobile-36' => 'pl-36',
            'mobile-40' => 'pl-40',
            'mobile-44' => 'pl-44',
            'mobile-48' => 'pl-48',
            'mobile-52' => 'pl-52',
            'mobile-56' => 'pl-56',
            'mobile-60' => 'pl-60',
            'mobile-64' => 'pl-64',
            'tablet-0' => 'md:pl-0',
            'tablet-1' => 'md:pl-1',
            'tablet-2' => 'md:pl-2',
            'tablet-3' => 'md:pl-3',
            'tablet-4' => 'md:pl-4',
            'tablet-5' => 'md:pl-5',
            'tablet-6' => 'md:pl-6',
            'tablet-7' => 'md:pl-7',
            'tablet-8' => 'md:pl-8',
            'tablet-9' => 'md:pl-9',
            'tablet-10' => 'md:pl-10',
            'tablet-11' => 'md:pl-11',
            'tablet-12' => 'md:pl-12',
            'tablet-14' => 'md:pl-14',
            'tablet-16' => 'md:pl-16',
            'tablet-20' => 'md:pl-20',
            'tablet-24' => 'md:pl-24',
            'tablet-28' => 'md:pl-28',
            'tablet-32' => 'md:pl-32',
            'tablet-36' => 'md:pl-36',
            'tablet-40' => 'md:pl-40',
            'tablet-44' => 'md:pl-44',
            'tablet-48' => 'md:pl-48',
            'tablet-52' => 'md:pl-52',
            'tablet-56' => 'md:pl-56',
            'tablet-60' => 'md:pl-60',
            'tablet-64' => 'md:pl-64',
            'desktop-0' => 'lg:pl-0',
            'desktop-1' => 'lg:pl-1',
            'desktop-2' => 'lg:pl-2',
            'desktop-3' => 'lg:pl-3',
            'desktop-4' => 'lg:pl-4',
            'desktop-5' => 'lg:pl-5',
            'desktop-6' => 'lg:pl-6',
            'desktop-7' => 'lg:pl-7',
            'desktop-8' => 'lg:pl-8',
            'desktop-9' => 'lg:pl-9',
            'desktop-10' => 'lg:pl-10',
            'desktop-11' => 'lg:pl-11',
            'desktop-12' => 'lg:pl-12',
            'desktop-14' => 'lg:pl-14',
            'desktop-16' => 'lg:pl-16',
            'desktop-20' => 'lg:pl-20',
            'desktop-24' => 'lg:pl-24',
            'desktop-28' => 'lg:pl-28',
            'desktop-32' => 'lg:pl-32',
            'desktop-36' => 'lg:pl-36',
            'desktop-40' => 'lg:pl-40',
            'desktop-44' => 'lg:pl-44',
            'desktop-48' => 'lg:pl-48',
            'desktop-52' => 'lg:pl-52',
            'desktop-56' => 'lg:pl-56',
            'desktop-60' => 'lg:pl-60',
            'desktop-64' => 'lg:pl-64',
        ];

        $pr = [
            'mobile-0' => 'pr-0',
            'mobile-1' => 'pr-1',
            'mobile-2' => 'pr-2',
            'mobile-3' => 'pr-3',
            'mobile-4' => 'pr-4',
            'mobile-5' => 'pr-5',
            'mobile-6' => 'pr-6',
            'mobile-7' => 'pr-7',
            'mobile-8' => 'pr-8',
            'mobile-9' => 'pr-9',
            'mobile-10' => 'pr-10',
            'mobile-11' => 'pr-11',
            'mobile-12' => 'pr-12',
            'mobile-14' => 'pr-14',
            'mobile-16' => 'pr-16',
            'mobile-20' => 'pr-20',
            'mobile-24' => 'pr-24',
            'mobile-28' => 'pr-28',
            'mobile-32' => 'pr-32',
            'mobile-36' => 'pr-36',
            'mobile-40' => 'pr-40',
            'mobile-44' => 'pr-44',
            'mobile-48' => 'pr-48',
            'mobile-52' => 'pr-52',
            'mobile-56' => 'pr-56',
            'mobile-60' => 'pr-60',
            'mobile-64' => 'pr-64',
            'tablet-0' => 'md:pr-0',
            'tablet-1' => 'md:pr-1',
            'tablet-2' => 'md:pr-2',
            'tablet-3' => 'md:pr-3',
            'tablet-4' => 'md:pr-4',
            'tablet-5' => 'md:pr-5',
            'tablet-6' => 'md:pr-6',
            'tablet-7' => 'md:pr-7',
            'tablet-8' => 'md:pr-8',
            'tablet-9' => 'md:pr-9',
            'tablet-10' => 'md:pr-10',
            'tablet-11' => 'md:pr-11',
            'tablet-12' => 'md:pr-12',
            'tablet-14' => 'md:pr-14',
            'tablet-16' => 'md:pr-16',
            'tablet-20' => 'md:pr-20',
            'tablet-24' => 'md:pr-24',
            'tablet-28' => 'md:pr-28',
            'tablet-32' => 'md:pr-32',
            'tablet-36' => 'md:pr-36',
            'tablet-40' => 'md:pr-40',
            'tablet-44' => 'md:pr-44',
            'tablet-48' => 'md:pr-48',
            'tablet-52' => 'md:pr-52',
            'tablet-56' => 'md:pr-56',
            'tablet-60' => 'md:pr-60',
            'tablet-64' => 'md:pr-64',
            'desktop-0' => 'lg:pr-0',
            'desktop-1' => 'lg:pr-1',
            'desktop-2' => 'lg:pr-2',
            'desktop-3' => 'lg:pr-3',
            'desktop-4' => 'lg:pr-4',
            'desktop-5' => 'lg:pr-5',
            'desktop-6' => 'lg:pr-6',
            'desktop-7' => 'lg:pr-7',
            'desktop-8' => 'lg:pr-8',
            'desktop-9' => 'lg:pr-9',
            'desktop-10' => 'lg:pr-10',
            'desktop-11' => 'lg:pr-11',
            'desktop-12' => 'lg:pr-12',
            'desktop-14' => 'lg:pr-14',
            'desktop-16' => 'lg:pr-16',
            'desktop-20' => 'lg:pr-20',
            'desktop-24' => 'lg:pr-24',
            'desktop-28' => 'lg:pr-28',
            'desktop-32' => 'lg:pr-32',
            'desktop-36' => 'lg:pr-36',
            'desktop-40' => 'lg:pr-40',
            'desktop-44' => 'lg:pr-44',
            'desktop-48' => 'lg:pr-48',
            'desktop-52' => 'lg:pr-52',
            'desktop-56' => 'lg:pr-56',
            'desktop-60' => 'lg:pr-60',
            'desktop-64' => 'lg:pr-64',
        ];

        $classes = [
            $this->get_class('top', 'mobile', $pt, $value),
            $this->get_class('top', 'tablet', $pt, $value),
            $this->get_class('top', 'desktop', $pt, $value),

            $this->get_class('bottom', 'mobile', $pb, $value),
            $this->get_class('bottom', 'tablet', $pb, $value),
            $this->get_class('bottom', 'desktop', $pb, $value),

            $this->get_class('left', 'mobile', $pl, $value),
            $this->get_class('left', 'tablet', $pl, $value),
            $this->get_class('left', 'desktop', $pl, $value),

            $this->get_class('right', 'mobile', $pr, $value),
            $this->get_class('right', 'tablet', $pr, $value),
            $this->get_class('right', 'desktop', $pr, $value)
        ];

        return implode(" ", array_filter($classes));
    }
}