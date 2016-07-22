//jQuery showcmp
var index=0;
var bg;
var skin= $(".category-cmpskin i").attr("skin");
var cmpo;
 $(document).ready(function(){
	//回到顶部代码
	$(window).scroll(function(){
			if($(this).scrollTop()<300){
				$("#get-top").fadeOut(500);
				//$("#head").removeClass("lockhead")
			}else{
				$("#get-top").fadeIn(500);
				//$("#head").addClass("lockhead")
			}
	});
	var h=$("html,body");
		$("#get-top").click(function(){
			h.animate({scrollTop:0},"2000");
		});
	//皮肤和音乐分类页面的标签选中效果
	
	//左下角的皮肤
		$(".open").click(function(){
			if($(".mini").offset().left<0){
						$(".mini").css("left","0")
						$(".open").css("transform","rotateY(180deg)");
					}else{
						$(".mini").css("left","-500px");
						$(".open").css("transform","rotateY(360deg)");
					}
				})
		$(".hidelist").click(function(){
			if($(".mini").height()<120){
				$(".mini,#cmp,#player").css("height","421px")
				$(this).css("backgroundPosition","0,0")
				//view_list(1)
			}else{
				$(".mini").css("height","111px")
				$(this).css("backgroundPosition","-38px,0")
				//view_list(0)
				}
			})
			//exodemo
			$(".exo_open").click(function(){
	$(this).toggleClass("exo_close")
	if($(".exobud").height()<25){
		$(".exobud").css("height","400px");
		}else{$(".exobud").css("height","24px");
		}
	})
	//侧边菜单伸缩
	$(".showmain").on("click",function(){
	$(".main").toggleClass("w70");
	//$(".content").toggleClass("huadong");
})
//选中
  $(".v-style>li").click(function(){
  var tag = $(this).attr("class")
  $(".fs4 li").filter(".tag-"+ tag).removeClass("hide");
	$(".fs4 li").not(".tag-"+ tag).addClass("hide");
	$(this).addClass("on").siblings().removeClass("on");
  })
  $(".showall").click(function(){
	$(".fs4 li").removeClass("hide");
  });
  //隐藏player
   $(".bt_close ,.cmp-mask").click(function(){
	$("#cmplayer").css("top","100%");
  });
	
	//首页的皮肤预览
	var _this;
	$(".category-cmpskin i").click(function(){
		 _this = $(this).parents("li").index();
		//$("#comment").load(_this+ " .nav-links")
		skin=$(this).attr("skin");
		title=$(this).parents("li").children("a").text();
		$(".skintitle").text(title);
		skinload(skin);
		$("#cmplayer").css("top","0");
		//return _this;
		})
	$(".prevskin").click(function(){
		var skinlist = $(".vlist li").filter(".category-cmpskin").not(".hide");
		if(_this<1){
		_this=1;
		$(".skintips").text("前面没有了");
		$(".skintips").animate({top:'50%',opacity:'1'},"fast");
		$(".skintips").animate({top:'50%',opacity:'0'},1500);
		$(".skintips").animate({top:'100%',opacity:'0'},"slow");
		
		//alert()
		}
		var title=skinlist.eq(_this).children("a").text();
		$(".skintitle").text(title);
		_this--;
		skin = skinlist.eq(_this).find("i").attr("skin");
		skinload(skin);
		//alert(_this)
	})	
	$(".nextskin").click(function(){
		var skinlist = $(".vlist li").filter(".category-cmpskin").not(".hide");
		_this++;
		if(_this>skinlist.length){
		_this=skinlist.length;
		$(".skintips").text("已经是最后一个了");
		$(".skintips").animate({top:'50%',opacity:'1'},"fast");
		$(".skintips").animate({top:'50%',opacity:'0'},2000);
		$(".skintips").animate({top:'100%',opacity:'0'},"slow");
		}
		//alert(_this)
		var title=skinlist.eq(_this).children("a").text();
		$(".skintitle").text(title);
		skin = skinlist.eq(_this).find("i").attr("skin");
		skinload(skin);
		
	})
 innercmp(skin);

	//拖动
	$(function(){
	//是否移动
		var mFlag=false;
	//鼠标与div左上角相对位置
		var divX,divY,
			pl=$(".v-play");
		pl.bind("click mousedown", function(e){
			e= e || window.event;
		if (e.type == 'click') {
			}else if(e.type == 'mousedown') {
			mFlag=true;
			divX =e.pageX - parseInt(pl.css("left"));
			divY =e.pageY - parseInt(pl.css("top"));
			}
	});
	$(document).mousemove(function(e){
		if(mFlag){
	//画出新坐标
		var pl=$(".v-play")
			le = e.pageX-divX,
			to = e.pageY-divY,
			winH = $(window).height(),
			winW = $(window).width(),
			cW = winW-pl.width()-20,
			cH = winH-pl.height()-20;
		if(le<0){
			le=0;
			}else if(le>cW){
				le=cW;
				}
		if(to<70){
			to=70;
			}else if(to>cH){
			to =cH;
			}
		pl.css({top:to,left:le});
		}
	}).mouseup(function(){
		mFlag=false;

		}); 
	})
})
//cmpAPI
function cmp_loaded(key) {
	cmpo = CMP.get("cmp");
	if (!cmpo) {
		
		//return;
	}
	cmpo.addEventListener("skin_loaded","skinloaded")
	//cmpo.addEventListener("view_list","view_list");
	//cmpo.addEventListener("skin_load","skinload")
	skinloaded();
	$(".loading").text("加载完成").animate({top:"-4em"},500);

};
//加载皮肤信息
function skininfo(){
	var skinxml = cmpo.skin_xml(),
	 xml= "<xml>"+skinxml+"</xml>",
	 info=$(xml).find("skin"),
	 name=info.attr("name"),
	 version=info.attr("version"),
	 author=info.attr("author"),
	 email=info.attr("email"),
	 url=info.attr("url"),
	 readme=info.attr("readme");
		//alert(name)
		$(".name").text(name);
		$(".version").text(version);
		$(".author").text(author);
		$(".email").text(email);
		$(".url").html("<a href="+url+" target="+"_blank"+">"+url+"</a>");
		$(".readme").text(readme);
		$(".skinmaster").text(author).attr("href",url);
	}
//初始化播放器
function innercmp(skin){
	var flashvars={
		api:"cmp_loaded",
		skin:skin,
		skin_id:"1"
		}
	var htm=CMP.create("cmp","100%","100%",cmp_url,flashvars,{wmode:"transparent"});
	$("#player").html(htm);
	
	}
//弹出层,播放器加载完成前弹出提示。
function indexplayer(){
	if(!cmpo){
		$(".loading").css("top","0");
		
	}else{
		$("#cmplayer").css("top","0");
		
		}
	}
//发送皮肤变更事件
function skinload(skin){
	cmpo.config("skin_id", "1");
	cmpo.sendEvent("skin_load",skin);
	};
	
//皮肤加载完成后
function skinloaded(){
	skininfo()
	$(".bt_download a").attr("href",skin);
	
	}
function view_list(data){
	cmpo.skin("list","display",data);
	}

/* function view_console(data){
	cmpo.skin("console", "display", data);
	cmpo.skin("list","display",data);
	//cmpo.skin("list","display",data);
	cmpo.skin("lrc","display",data);
	cmpo.skin("media","xywh","0,0,100P,100P");
	
	} */