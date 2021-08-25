<?php

namespace App\Observers;

use App\Models\Sell;
use App\Models\SellSummary;
use Carbon\Carbon;

class SellObserver
{
    /**
     * Handle the Sell "created" event.
     *
     * @param  \App\Models\Sell  $sell
     * @return void
     */
    public function created(Sell $sell)
    {
        $this->addSellToSellSummary($sell);
    }

    /**
     * Handle the Sell "updating" event.
     *
     * @param  \App\Models\Sell  $sell
     * @return void
     */
    public function updating(Sell $sell)
    {
        $this->removeSellFromSellSummary($sell);
        $this->addSellToSellSummary($sell);
    }

    /**
     * Handle the Sell "deleting" event.
     *
     * @param  \App\Models\Sell  $sell
     * @return void
     */
    public function deleting(Sell $sell)
    {
        $this->removeSellFromSellSummary($sell);
    }

    /**
     * removeSellFromSellSummary
     *
     * @param  mixed $sell
     * @return void
     */
    public function removeSellFromSellSummary($sell)
    {
        $price =    $sell->price;
        $discount = $sell->discount;
        $total =    $price - ($price * $discount / 100);

        $date = Carbon::make($sell->getOriginal('created_date'))->format('Y-m-d');
        $sell_summary = SellSummary::where('date', $date)->where('employee_id', $sell->employee_id)->first();

        if ($sell_summary !== null) {
            $sell_summary->last_update =    Carbon::now();
            $sell_summary->price_total =    $sell_summary->price_total - $price;
            $sell_summary->discount_total = $sell_summary->discount_total - $discount;
            $sell_summary->total =          $sell_summary->total - $total;

            $sell_summary->save();

            if ($sell_summary->price_total == 0)
                $sell_summary->delete();
        }
    }

    /**
     * addSellToSellSummary
     *
     * @param  mixed $sell
     * @return void
     */
    public function addSellToSellSummary($sell)
    {
        $date =     Carbon::make($sell->created_date)->format('Y-m-d');
        $price =    $sell->price;
        $discount = $sell->discount;

        $sell_summary = SellSummary::where('date', $date)->where('employee_id', $sell->employee_id)->first();
        $total = $price - ($price * $discount / 100);

        if ($sell_summary !== null) {
            $sell_summary->last_update =    Carbon::now();
            $sell_summary->price_total =    $sell_summary->price_total + $price;
            $sell_summary->discount_total = $sell_summary->discount_total + $discount;
            $sell_summary->total =          $sell_summary->total + $total;

            $sell_summary->save();
        } else {
            $sell_summary = SellSummary::create([
                'date' =>           $date,
                'employee_id' =>    $sell->employee_id,
                'created_date' =>   Carbon::now(),
                'last_update' =>    Carbon::now(),
                'price_total' =>    $price,
                'discount_total' => $discount,
                'total' =>          $total,
            ]);
        }
    }
}
