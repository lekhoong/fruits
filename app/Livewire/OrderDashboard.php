<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Purchases;

class OrderDashboard extends Component
{
    use WithPagination;

    public $search = '';
    public $status = 'all';

    protected $updatesQueryString = ['search', 'status'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Purchases::with('user', 'Items.product');

        if ($this->search) {
            $query->where('id', 'like', '%' . $this->search . '%')
                  ->orWhereHas('user', function($q) {
                      $q->where('name', 'like', '%' . $this->search . '%');
                  });
        }

        if ($this->status == 'pending') {
            $query->where('status', 'pending');
        } elseif ($this->status == 'completed') {
            $query->where('status', 'completed');
        }

        $purchases = $query->orderBy('created_at', 'desc')->paginate(10);

        $pendingCount = Purchases::where('status', 'pending')->count();
        $completedCount = Purchases::where('status', 'completed')->count();

        return view('livewire.order-dashboard', compact('purchases', 'pendingCount', 'completedCount'));
    }
}

