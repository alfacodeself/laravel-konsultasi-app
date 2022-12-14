@extends('layouts.app')

@section('title', 'Histori Transaksi')
@section('page', 'Histori Transaksi')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        @include('partials.alert')
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="header-title mt-0 mb-3">Jadwal Konseling Hari Ini</h4> --}}

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <span class="text-capitalize">
                                                    {{ $transaction->transactionable->user->nama }}
                                                </span>
                                            </td>
                                            <td>
                                                {{ $transaction->transactionable->psycholog->judul ?? $transaction->transactionable->pricing->nama_paket }}
                                            </td>
                                            <td>{{ 'Rp.' . number_format($transaction->total_amount) }}</td>
                                            <td>
                                                @if ($transaction->status == 'unpaid')
                                                    <a href="{{ route('user.transaksi.show', $transaction->reference) }}"
                                                        class="btn btn-outline-secondary py-0">Bayar</a>
                                                @else
                                                    <a href="{{ route('user.transaksi.detail', $transaction->reference) }}"
                                                        class="btn btn-outline-success py-0">Detail</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->
        </div>

    </div> <!-- container-fluid -->
@endsection
