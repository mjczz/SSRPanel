@extends('user.layouts')
@section('css')
@endsection
@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="padding-top:0;">
        <!-- BEGIN PAGE BASE CONTENT -->
        @if (Session::has('successMsg'))
            <div class="alert alert-success">
                <button class="close" data-close="alert"></button>
                {{Session::get('successMsg')}}
            </div>
        @endif
        <div class="row">
            <div class="col-md-8">
                @if($notice)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class="icon-directions font-green hide"></i>
                                        <span class="caption-subject font-blue bold"> {{trans('home.announcement')}} </span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <div>
                                             {!!$notice->content!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-blue bold">{{trans('home.subscribe_address')}}</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="mt-clipboard-container" style="padding-top:0px;">
                                    <div class="alert alert-danger">
                                        <p> {{trans('home.subscribe_warning')}} </p>
                                    </div>
                                    @if($subscribe_status)
                                        <input type="text" id="mt-target-1" class="form-control" value="{{$link}}" />
                                        <a href="javascript:exchangeSubscribe();" class="btn green">
                                            {{trans('home.exchange_subscribe')}}
                                        </a>
                                        <a href="javascript:;" class="btn blue mt-clipboard" data-clipboard-action="copy" data-clipboard-target="#mt-target-1">
                                            {{trans('home.copy_subscribe_address')}}
                                        </a>
                                    @else
                                        <h3>{{trans('home.subscribe_baned')}}</h3>
                                    @endif

                                    <div class="tabbable-line">
                                        <ul class="nav nav-tabs ">
                                            <li class="active">
                                                <a href="#tools1" data-toggle="tab"> <i class="fa fa-apple"></i> Mac </a>
                                            </li>
                                            <li>
                                                <a href="#tools2" data-toggle="tab"> <i class="fa fa-windows"></i> Windows </a>
                                            </li>
                                            <li>
                                                <a href="#tools3" data-toggle="tab"> <i class="fa fa-linux"></i> Linux </a>
                                            </li>
                                            <li>
                                                <a href="#tools4" data-toggle="tab"> <i class="fa fa-apple"></i> iOS </a>
                                            </li>
                                            <li>
                                                <a href="#tools5" data-toggle="tab"> <i class="fa fa-android"></i> Android </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" style="font-size:16px;">
                                            <div class="tab-pane active" id="tools1">
                                                <ol>
                                                    <li> <a href="{{asset('clients/ShadowsocksX-NG.1.8.2.zip')}}" target="_blank">点击此处</a>下载客户端并启动 </li>
                                                    <li> 单击状态栏小飞机，找到服务器->编辑订阅，复制黏贴订阅地址 </li>
                                                    <li> 点击服务器->手动更新订阅，更新您的服务信息 </li>
                                                    <li> 更新成功后，请在服务器菜单处选择线路，并点击打开ShadowsocksR </li>
                                                    <li> 单击小飞机，选择PAC自动模式 </li>
                                                </ol>
                                            </div>
                                            <div class="tab-pane" id="tools2">
                                                <ol>
                                                    <li> <a href="{{asset('clients/Shadowsocks-4.1.2.zip')}}" target="_blank">点击此处</a>下载客户端并启动 </li>
                                                    <li> 单击状态栏小飞机，找到服务器->订阅->订阅设置，复制黏贴订阅地址 </li>
                                                    <li> 点击状态栏小飞机，找到模式，选中PAC </li>
                                                    <li> 点击状态栏小飞机，找到PAC，选中更新PAC为GFWList </li>
                                                </ol>
                                            </div>
                                            <div class="tab-pane" id="tools3">
                                                <ol>
                                                    <li> <a href="{{asset('clients/Shadowsocks-qt5-3.0.1.zip')}}" target="_blank">点击此处</a>下载客户端并启动 </li>
                                                    <li> 单击状态栏小飞机，找到服务器->编辑订阅，复制黏贴订阅地址 </li>
                                                    <li> 更新订阅设置即可 </li>
                                                </ol>
                                            </div>
                                            <div class="tab-pane" id="tools4">
                                                <ol>
                                                    @if(Agent::is('iPhone') || Agent::is('iPad'))
                                                        @if(Agent::is('Safari'))
                                                            <li> <a href="{{$ipa_list}}" target="_blank">点击此处在线安装</a></li>
                                                        @else
                                                            <li> <a href="javascript:onlineInstallWarning();">点击此处在线安装</a></li>
                                                        @endif
                                                    @endif
                                                    <li> 请从站长处获取App Store账号密码 </li>
                                                </ol>
                                            </div>
                                            <div class="tab-pane" id="tools5">
                                                <ol>
                                                    <li> <a href="{{asset('clients/Shadowsocks-universal-4.6.1.apk')}}" target="_blank">点击此处</a>下载客户端并启动 </li>
                                                    <li> 单击左上角的shadowsocksR进入配置文件页，点击右下角的“+”号，点击“添加/升级SSR订阅”，填入订阅信息并保存 </li>
                                                    <li> 选中任意一个节点，返回软件首页 </li>
                                                    <li> 在软件首页处找到“路由”选项，并将其改为“绕过局域网及中国大陆地址” </li>
                                                    <li> 点击右上角的小飞机图标进行连接，提示是否添加（或创建）VPN连接，点同意（或允许） </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if(!$nodeList->isEmpty())
                <div class="row widget-row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <div class="tab-pane active">
                                        <div class="mt-comments">
                                            @foreach($nodeList as $node)
                                                <div class="mt-comment">
                                                    <div class="mt-comment-img" style="width:auto;">
                                                        @if($node->country_code)
                                                            <img src="{{asset('assets/images/country/' . $node->country_code . '.png')}}"/>
                                                        @else
                                                            <img src="{{asset('/assets/images/country/un.png')}}"/>
                                                        @endif
                                                    </div>
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <span class="mt-comment-author">{{$node->name}}</span>
                                                            <span class="mt-comment-date">
                                                                @if(!$node->online_status)
                                                                    <span class="badge badge-danger">维护中</span>
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="mt-comment-text"> {{$node->desc}} </div>
                                                        <div class="mt-comment-details">
                                                            <span class="mt-comment-status mt-comment-status-pending">
                                                                @if($node->labels)
                                                                    @foreach($node->labels as $vo)
                                                                        <span class="badge badge-info">{{$vo->labelInfo->name}}</span>
                                                                    @endforeach
                                                                @endif
                                                            </span>
                                                            <ul class="mt-comment-actions" style="display: block;">
                                                                <li>
                                                                    <a class="btn btn-sm green btn-outline" data-toggle="modal" href="#txt_{{$node->id}}" > <i class="fa fa-reorder"></i> </a>
                                                                </li>
                                                                <li>
                                                                    <a class="btn btn-sm green btn-outline" data-toggle="modal" href="#link_{{$node->id}}"> @if($node->type == 1) <i class="fa fa-paper-plane"></i> @else <i class="fa fa-vimeo"></i> @endif </a>
                                                                </li>
                                                                <li>
                                                                    <a class="btn btn-sm green btn-outline" data-toggle="modal" href="#qrcode_{{$node->id}}"> <i class="fa fa-qrcode"></i> </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-4" >
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue bold">{{trans('home.account_info')}}</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                <label class="btn red btn-sm">
                                    <a href="javascript:;" data-toggle="modal" data-target="#charge_modal" style="color: #FFF;">{{trans('home.recharge')}}</a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form">
                            <div class="form-horizontal" style="margin: 0; padding: 0;">
                                @if($info['enable'])
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label class="col-md-4 control-label">{{trans('home.account_status')}}：</label>
                                        <p class="form-control-static"> <span class="label label-success">{{trans('home.enabled')}}</span> </p>
                                    </div>
                                @else
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label class="col-md-4 control-label">{{trans('home.account_status')}}：</label>
                                        <p class="form-control-static"> <span class="label label-danger">{{trans('home.disabled')}}</span> </p>
                                    </div>
                                @endif
                                @if(\App\Components\Helpers::systemConfig()['login_add_score'])
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label class="col-md-4 control-label">{{trans('home.account_score')}}：</label>
                                        <p class="form-control-static"> <a href="javascript:;" data-toggle="modal" data-target="#exchange_modal" style="color:#000;">{{$info['score']}}</a> </p>
                                    </div>
                                @endif
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="col-md-4 control-label">{{trans('home.account_balance')}}：</label>
                                    <p class="form-control-static"> {{$info['balance']}} </p>
                                </div>
                                @if(date('Y-m-d') > $info['expire_time'])
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label class="col-md-4 control-label">{{trans('home.account_expire')}}：</label>
                                        <p class="form-control-static"> {{trans('home.expired')}} </p>
                                    </div>
                                @else
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label class="col-md-4 control-label">{{trans('home.account_expire')}}：</label>
                                        <p class="form-control-static"> {{$info['expire_time']}} </p>
                                    </div>
                                @endif
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="col-md-4 control-label">{{trans('home.account_last_usage')}}：</label>
                                    <p class="form-control-static"> {{empty($info['t']) ? trans('home.never_used') : date('Y-m-d H:i:s', $info['t'])}} </p>
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="col-md-4 control-label">{{trans('home.account_last_login')}}：</label>
                                    <p class="form-control-static"> {{empty($info['last_login']) ? trans('home.never_loggedin') : date('Y-m-d H:i:s', $info['last_login'])}} </p>
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="col-md-4 control-label">{{trans('home.account_bandwidth_usage')}}：</label>
                                    <p class="form-control-static"> {{$info['usedTransfer']}}（{{$info['totalTransfer']}}） </p>
                                </div>
                                @if($info['traffic_reset_day'])
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label class="col-md-4 control-label"></label>
                                        <p class="form-control-static"> {{trans('home.account_reset_notice', ['reset_day' => $info['traffic_reset_day']])}} </p>
                                    </div>

                                @endif
                            </div>
                        </form>
                    </div>
                </div>
                @if(\App\Components\Helpers::systemConfig()['is_push_bear'] && \App\Components\Helpers::systemConfig()['push_bear_qrcode'])
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-blue bold">微信扫码订阅，获取最新资讯</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div id="subscribe_qrcode" style="text-align: center;"></div>
                        </div>
                    </div>
                @endif

                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue sbold uppercase">{{trans('home.account_login_log')}}</span>
                        </div>
                    </div>
                    <div class="portlet-body" style="padding: 0 20px;">
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <tbody>
                                    @foreach($userLoginLog as $log)
                                        <tr>
                                            <td> {{$log->created_at}} </td>
                                            <td> {{$log->ip}} </td>
                                            <td> {{$log->area}} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="charge_modal" class="modal fade" tabindex="-1" data-focus-on="input:first" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">{{trans('home.recharge_balance')}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" style="display: none; text-align: center;" id="charge_msg"></div>
                        <form action="#" method="post" class="form-horizontal">
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="charge_type" class="col-md-4 control-label">{{trans('home.payment_method')}}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="charge_type" id="charge_type">
                                            <option value="1" selected>{{trans('home.coupon_code')}}</option>
                                            @if(!$goodsList->isEmpty())
                                                <option value="2">{{trans('home.online_pay')}}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                @if(!$goodsList->isEmpty())
                                    <div class="form-group" id="charge_balance" style="display: none;">
                                        <label for="online_pay" class="col-md-4 control-label">充值金额</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="online_pay" id="online_pay">
                                                @foreach($goodsList as $key => $goods)
                                                    <option value="{{$goods->id}}">充值{{$goods->price}}元</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group" id="charge_coupon_code">
                                    <label for="charge_coupon" class="col-md-4 control-label"> {{trans('home.coupon_code')}} </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="charge_coupon" id="charge_coupon" placeholder="{{trans('home.please_input_coupon')}}">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">{{trans('home.close')}}</button>
                        <button type="button" class="btn red btn-outline" onclick="return charge();">{{trans('home.recharge')}}</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="exchange_modal" class="modal fade" tabindex="-1" data-focus-on="input:first" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title"> {{trans('home.redeem_score')}} </h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info" id="msg">{{trans('home.redeem_info', ['score' => $info['score']])}}</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">{{trans('home.close')}}</button>
                        <button type="button" class="btn red btn-outline" onclick="return exchange();">{{trans('home.redeem')}}</button>
                    </div>
                </div>
            </div>
        </div>

        @foreach($nodeList as $node)
            <!-- 配置文本 -->
            <div class="modal fade draggable-modal" id="txt_{{$node->id}}" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">{{trans('home.setting_info')}}</h4>
                        </div>
                        <div class="modal-body">
                            <textarea class="form-control" rows="10" readonly="readonly">{{$node->txt}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 配置链接 -->
            <div class="modal fade draggable-modal" id="link_{{$node->id}}" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">{{$node->name}}</h4>
                        </div>
                        <div class="modal-body">
                            @if($node->type == 1)
                                <textarea class="form-control" rows="5" readonly="readonly">{{$node->ssr_scheme}}</textarea>
                                <a href="{{$node->ssr_scheme}}" class="btn purple uppercase" style="display: block; width: 100%;margin-top: 10px;">打开SSR</a>
                                @if($node->ss_scheme)
                                    <p></p>
                                    <textarea class="form-control" rows="3" readonly="readonly">{{$node->ss_scheme}}</textarea>
                                    <a href="{{$node->ss_scheme}}" class="btn blue uppercase" style="display: block; width: 100%;margin-top: 10px;">打开SS</a>
                                @endif
                            @else
                                @if($node->v2_scheme)
                                    <p></p>
                                    <textarea class="form-control" rows="3" readonly="readonly">{{$node->v2_scheme}}</textarea>
                                    <a href="{{$node->v2_scheme}}" class="btn blue uppercase" style="display: block; width: 100%;margin-top: 10px;">打开V2ray</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- 配置二维码 -->
            <div class="modal fade" id="qrcode_{{$node->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog @if($node->type == 2 || !$node->compatible) modal-sm @endif">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">{{trans('home.scan_qrcode')}}</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @if ($node->type == 1)
                                    @if ($node->compatible)
                                        <div class="col-md-6">
                                            <div id="qrcode_ssr_img_{{$node->id}}" style="text-align: center;"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="qrcode_ss_img_{{$node->id}}" style="text-align: center;"></div>
                                        </div>
                                    @else
                                        <div class="col-md-12">
                                            <div id="qrcode_ssr_img_{{$node->id}}" style="text-align: center;"></div>
                                        </div>
                                    @endif
                                @else
                                    <div class="col-md-12">
                                        <div id="qrcode_v2_img_{{$node->id}}" style="text-align: center;"></div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
@endsection
@section('script')
    <script src="/assets/global/plugins/clipboardjs/clipboard.min.js" type="text/javascript"></script>
    <script src="/assets/pages/scripts/components-clipboard.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-qrcode/jquery.qrcode.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        // 切换充值方式
        $("#charge_type").change(function(){
            if ($(this).val() == 2) {
                $("#charge_balance").show();
                $("#charge_coupon_code").hide();
            } else {
                $("#charge_balance").hide();
                $("#charge_coupon_code").show();
            }
        });

        // 充值
        function charge() {
            var charge_type = $("#charge_type").val();
            var charge_coupon = $("#charge_coupon").val();
            var online_pay = $("#online_pay").val();

            if (charge_type == '2') {
                $("#charge_msg").show().html("正在跳转支付界面");
                window.location.href = '/buy/' + online_pay;
                return false;
            }

            if (charge_type == '1' && (charge_coupon == '' || charge_coupon == undefined)) {
                $("#charge_msg").show().html("{{trans('home.coupon_not_empty')}}");
                $("#charge_coupon").focus();
                return false;
            }

            $.ajax({
                url:'{{url('charge')}}',
                type:"POST",
                data:{_token:'{{csrf_token()}}', coupon_sn:charge_coupon},
                beforeSend:function(){
                    $("#charge_msg").show().html("{{trans('home.recharging')}}");
                },
                success:function(ret){
                    if (ret.status == 'fail') {
                        $("#charge_msg").show().html(ret.message);
                        return false;
                    }

                    $("#charge_modal").modal("hide");
                    window.location.reload();
                },
                error:function(){
                    $("#charge_msg").show().html("{{trans('home.error_response')}}");
                },
                complete:function(){}
            });
        }

        // 积分兑换流量
        function exchange() {
            $.ajax({
                type: "POST",
                url: "{{url('exchange')}}",
                async: false,
                data: {_token:'{{csrf_token()}}'},
                dataType: 'json',
                success: function (ret) {
                    layer.msg(ret.message, {time:1000}, function() {
                        if (ret.status == 'success') {
                            window.location.reload();
                        }
                    });
                }
            });

            return false;
        }

        // 在线安装警告提示
        function onlineInstallWarning() {
            layer.msg('仅限在Safari浏览器下有效', {time:1000});
        }
    </script>

    <script type="text/javascript">
        var UIModals = function () {
            var n = function () {
                @foreach($nodeList as $node)
                    $("#txt_{{$node->id}}").draggable({handle: ".modal-header"});
                    $("#qrcode_{{$node->id}}").draggable({handle: ".modal-header"});
                @endforeach
            };

            return {
                init: function () {
                    n()
                }
            }
        }();

        jQuery(document).ready(function () {
            UIModals.init()
        });

        // 循环输出节点scheme用于生成二维码
        @foreach ($nodeList as $node)
            @if($node->type == 1)
                $('#qrcode_ssr_img_{{$node->id}}').qrcode("{{$node->ssr_scheme}}");
                @if($node->ss_scheme)
                    $('#qrcode_ss_img_{{$node->id}}').qrcode("{{$node->ss_scheme}}");
                @endif
            @else
                $('#qrcode_v2_img_{{$node->id}}').qrcode("{{$node->v2_scheme}}");
            @endif
        @endforeach

        // 节点订阅
        function subscribe() {
            window.location.href = '{{url('subscribe')}}';
        }

        // 显示加密、混淆、协议
        function show(txt) {
            layer.msg(txt);
        }

        // 生成消息通道订阅二维码
        @if(\App\Components\Helpers::systemConfig()['push_bear_qrcode'])
            $('#subscribe_qrcode').qrcode({render:"canvas", text:"{{\App\Components\Helpers::systemConfig()['push_bear_qrcode']}}", width:170, height:170});
        @endif

        // 更换订阅地址
        function exchangeSubscribe() {
            layer.confirm('更换订阅地址将导致：<br>1.旧地址立即失效；<br>2.连接密码被更改；', {icon: 7, title:'警告'}, function(index) {
                $.post("{{url('exchangeSubscribe')}}", {_token:'{{csrf_token()}}'}, function (ret) {
                    layer.msg(ret.message, {time:1000}, function () {
                        if (ret.status == 'success') {
                            window.location.reload();
                        }
                    });
                });

                layer.close(index);
            });
        }
    </script>
@endsection
