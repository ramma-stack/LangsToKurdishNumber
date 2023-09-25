<?php

class Converter
{

    /**
     * Convert a number to Kurdish words
     *
     * @param string $num
     * @return string
     */

    public static function NumToKu($num = '')
    {
        $num = (int) $num;

        if ($num === 0) {
            return 'سفر';
        }

        $kurdishWords = '';

        $list1 = [
            '', 'یەک', 'دوو', 'سێ', 'چوار', 'پێنج', 'شەش', 'حەوت', 'هەشت', 'نۆ',
            'دە', 'یازدە', 'دوازدە', 'سیازدە', 'چوادە', 'پازدە', 'شازدە', 'حەڤدە', 'هەژدە', 'نۆزدە'
        ];
        $list2 = ['', '', 'بیست', 'سی', 'چل', 'پەنجا', 'شەست', 'حەفتا', 'هەشتا', 'نەوەد'];

        // Process millions, billions, trillions, etc.
        $levels = [
            '',
            'هەزار',
            'ملیۆن',
            'ملیار',
            'ترلیۆن',
            'کوادرلیۆن',
            'کوینتلیۆن',
            'سکسلیۆن',
            'سپتلیۆن',
            'ئۆکتلیۆن',
            'نۆنیۆن',
            'دەسیلیۆن',
            'یازدەسیلیۆن',
            'دوازدەسیلیۆن',
            'سێزدەسیلیۆن',
            'چواردەسیلیۆن',
            'پازدەسیلیۆن',
            'پانزدەسیلیۆن',
            'شانزدەسیلیۆن',
            'حەڤدەسیلیۆن',
            'هەژدەسیلیۆن',
            'ویجنتلیۆن'
        ];

        $num = str_pad($num, ceil(strlen($num) / 3) * 3, '0', STR_PAD_LEFT);
        $numChunks = str_split($num, 3);

        foreach ($numChunks as $key => $chunk) {
            $chunk = (int) $chunk;

            if ($chunk !== 0) {
                $hundreds = (int) ($chunk / 100);
                $tens = (int) ($chunk % 100);
                $ones = (int) ($chunk % 10);


                $levelWord = $levels[count($numChunks) - $key - 1];
                $chunkWords = [];

                if ($hundreds > 0) {
                    if ($hundreds === 1) {
                        $chunkWords[] = 'سەد';
                    } else {
                        $chunkWords[] = $list1[$hundreds] . ' سەد';
                    }
                }

                if ($tens > 0) {
                    if ($tens < 20) {
                        $chunkWords[] = $list1[$tens];
                    } else {
                        $chunkWords[] = $list2[(int) ($tens / 10)];
                        if ($ones > 0) {
                            $chunkWords[] = $list1[$ones];
                        }
                    }
                } elseif ($ones > 0) {
                    $chunkWords[] = $list1[$ones];
                }

                if ($levelWord) {
                    $levelWord .= ' و ';
                }

                $kurdishWords .= implode(' و ', $chunkWords) . ' ' . $levelWord . '';
            }
        }

        return trim($kurdishWords);
    }
}
